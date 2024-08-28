<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
{
    // Récupère la valeur du champ de recherche
    $search = $request->input('search');

    // Rechercher des produits en fonction du titre
    $products = Product::where('title', 'like', "%$search%")->paginate(10); // Ajoutez la pagination

    // Comptez les utilisateurs, produits, commandes, et commandes livrées
    $user = User::count();
    $product = Product::count();
    $order = Order::count();
    $deliverd = Order::where('status', 'Delivered')->count();
    
    // Passe les variables à la vue
    return view('admin.index', compact('user', 'product', 'order', 'deliverd', 'products'));
}


    public function home()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : count(session()->get('cart', []));
        
        return view('home.index', compact('products', 'count', 'categories'));
    }

    public function login_home()
    {
        $products = Product::all();
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;

        return view('home.index', compact('products', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::findOrFail($id);
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        
        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart(Request $request, $id)
{
    // Vérifiez que le produit existe
    $product = Product::find($id);
    
    if (!$product) {
        toastr()->error('Produit non trouvé.');
        return redirect()->back();
    }

    // Récupérer le panier actuel de la session
    $cart = session()->get('cart', []);

    // Ajouter le produit au panier ou augmenter la quantité
    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'id' => $id,
            'quantity' => 1,
            'price' => $product->price
        ];
    }

    // Mettre à jour le panier dans la session
    session()->put('cart', $cart);

    // Afficher un message de succès
    toastr()->success('Le produit a été ajouté au panier avec succès.');

    // Redirection
    return redirect()->back();
}



    public function mycart()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $product_ids = Cart::where('user_id', $user_id)->pluck('product_id');
            $cartItems = Product::whereIn('id', $product_ids)->get();
        } else {
            $cart = session()->get('cart', []);
            $product_ids = array_keys($cart);
            $cartItems = Product::whereIn('id', $product_ids)->get();
        }

        $count = $cartItems->count();
        return view('home.mycart', compact('count', 'cartItems'));
    }

    public function update_cart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            toastr()->error('Le produit n\'est pas dans le panier.');
            return redirect()->back();
        }

        $quantity = $request->input('quantity', 1);

        if ($quantity <= 0) {
            toastr()->error('La quantité doit être supérieure à zéro.');
            return redirect()->back();
        }

        $cart[$id]['quantity'] = $quantity;
        $cart[$id]['total'] = $cart[$id]['price'] * $quantity;
        session()->put('cart', $cart);

        toastr()->success('La quantité du produit a été mise à jour.');
        return redirect()->back();
    }

    public function delete_cart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            toastr()->success('Le produit a été supprimé du panier avec succès.');
        } else {
            toastr()->error('Le produit n\'est pas dans le panier.');
        }

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
        
        $user_id = Auth::id();
        $cart = Auth::check() ? Cart::where('user_id', $user_id)->get() : session()->get('cart', []);
        
        foreach ($cart as $key => $item) {
            // Vérifiez si $item est un tableau ou un objet
            if (is_array($item)) {
                Order::create([
                    'name' => $request->name,
                    'rec_address' => $request->address,
                    'phone' => $request->phone,
                    'user_id' => null, // Pas d'utilisateur connecté
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                ]);
            } elseif (is_object($item)) {
                Order::create([
                    'name' => $request->name,
                    'rec_address' => $request->address,
                    'phone' => $request->phone,
                    'user_id' => $user_id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                ]);
            }
        }
        
        if (Auth::check()) {
            Cart::where('user_id', $user_id)->delete();
        } else {
            session()->forget('cart');
        }
        
        toastr()->success('La commande a été envoyée avec succès.');
        return redirect()->back();
    }
    
    

    public function checkout()
{
    $user_id = Auth::id();
    if ($user_id) {
        $cartItems = Cart::where('user_id', $user_id)->get();
    } else {
        $cart = session()->get('cart', []);
        $cartItems = collect([]);
        foreach ($cart as $item) {
            $cartItems->push((object) $item);
        }
    }
    
    // Récupérer les IDs des produits
    $product_ids = $cartItems->map(function ($item) {
        return is_object($item) ? $item->id : $item['id'];
    })->toArray();
    
    // Récupérer les informations des produits
    $products = Product::whereIn('id', $product_ids)->get();
    
    return view('home.checkout', compact('cartItems', 'products'));
}
// public function search(Request $request)
// {
//     $query = $request->input('query');
//     $products = Product::where('title', 'LIKE', "%$query%")
//                         ->orWhere('description', 'LIKE', "%$query%")
//                         ->get();

//     // Compter le nombre d'éléments dans le panier (ajustez selon votre logique)
//     $count = Cart::count(); // Supposant que vous utilisez un panier via une session ou un modèle

//     // Retourner la vue avec les résultats de recherche et le nombre d'éléments dans le panier
//     return view('home.index', compact('products', 'count'));
// }

public function searchProducts(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('title', 'LIKE', "%$query%")
                        ->orWhere('description', 'LIKE', "%$query%")
                        ->get();
    
    // Supposons que vous avez une fonction qui compte les produits dans le panier
    $count = Cart::where('user_id', auth()->id())->count();
    
    return view('home.index', compact('products', 'count'));
}
// public function showContactForm()
//     {
//         $count = $this->getCartCount(); // Méthode pour compter les éléments du panier si elle est définie
//         return view('home.contact', compact('count'));
//     }

//     // Traiter la soumission du formulaire de contact
//     public function submitContactForm(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|max:255',
//             'message' => 'required|string|min:10',
//         ]);

//         // Envoyer un email avec les détails du contact
//         Mail::send('emails.contact', [
//             'name' => $request->name,
//             'email' => $request->email,
//             'messageContent' => $request->message,
//         ], function($mail) use ($request) {
//             $mail->from($request->email, $request->name);
//             $mail->to('votre.email@exemple.com')->subject('Nouveau message de contact');
//         });

//         toastr()->success('Votre message a été envoyé avec succès.');
//         return redirect()->back();
//     }

//     private function getCartCount()
//     {
//         return Auth::check() ? Cart::where('user_id', Auth::id())->count() : count(session()->get('cart', []));
//     }






    


}
