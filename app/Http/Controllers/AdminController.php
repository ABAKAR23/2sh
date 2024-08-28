<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Category Added Successfully.');

        return redirect()->back();

    }

    public function delete_category($id){
        $data = Category::find($id);

        $data->delete();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Category Deleted Successfully.');

        return redirect()->back();

    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));

    }

    public function update_category(Request $request,$id){
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Category Updeted Successfully.');

        return redirect('/view_category');

    }

    public function add_product() {
        $categories = Category::all(); // Changez $category en $categories
        return view('admin.add_product', compact('categories')); // Utilisez compact('categories')
    }
    

    //la fonction pour ajouter les produits dans la bases de donnes
    public function upload_product(Request $request) {
        $data = new Product;
    
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category_id = $request->category_id; // Assurez-vous que c'est bien 'category_id'
    
        $image = $request->image;
        if($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
    
        $data->save();
    
        toastr()->timeOut(1000)->closeButton()->addSuccess('Le produit a été ajouté avec succès.');
    
        return redirect()->back();
    }
    
    

    //la fonction pour afficher les produits
    public function view_product(){
        $products = Product::with('category')->paginate(3); // Assurez-vous de récupérer les produits avec leurs catégories
        return view('admin.view_product', compact('products')); // Passez la variable 'products' à la vue
    }
    

    //la fonction pour supprimer un produit

    public function delete_product($id){
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);

        if(file_exists( $image_path)){
            unlink($image_path);

        }

        $data->delete();

        toastr()->timeOut(1000)->closeButton()->addSuccess('le produit  a ete supprimer avec success.');

        return redirect()->back();

    }

    public function update_product($id){
        $data = Product::find($id);
        $categories = Category::all(); // Assurez-vous de récupérer toutes les catégories
    
        return view('admin.update_page', compact('data', 'categories'));
    }
    

    public function edit_product(Request $request, $id){
        $data = Product::find($id);
    
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id; // Assurez-vous que c'est category_id et non category
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $data->image = $imagename;
        }
    
        $data->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Le produit a été mis à jour avec succès.');
    
        return redirect('/view_product');
    }
    
    

    //la methode pour chercher un produit
    public function product_search(Request $request){
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%' . $search . '%')
                           ->orWhereHas('category', function ($query) use ($search) {
                               $query->where('category_name', 'LIKE', '%' . $search . '%');
                           })
                           ->paginate(3);
    
        return view('admin.view_product', compact('product'));
    }
    

    public function view_orders(){
        $data = Order::paginate(3); // Vous pouvez ajuster le nombre d'éléments par page
        return view('admin.order', compact('data'));
    }
    

    public function on_the_way($id){
        $data = Order::find($id);

        $data->status = 'on the way';

        $data->save();

        return redirect('/view_orders');

    }

    public function delivered($id){
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');

    }

    public function print_pdf($id) {
        // Récupérer la commande spécifique en utilisant l'ID
        $order = Order::findOrFail($id);
        
    
        // Passer les données de la commande à la vue
        $pdf = Pdf::loadView('admin.invoice', ['order' => $order]);
    
        // Télécharger le PDF
        return $pdf->download('invoice.pdf');
    }
    public function change_status($id)
    {
        $order = Order::find($id);
    
        if ($order->status == 'en cours') {
            $order->status = 'en route';
        } elseif ($order->status == 'en route') {
            $order->status = 'Livré';
        }
    
        $order->save();
    
        return redirect()->route('view_orders');
    }
    

    
}
