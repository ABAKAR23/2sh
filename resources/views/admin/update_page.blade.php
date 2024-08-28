<!-- resources/views/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
@include('admin.css')
<style type="text/css">
    .main-container {
        display: flex;
    }

    .sidebar {
        flex: 0 0 250px;
        /* Ajustez cette largeur selon les besoins */
    }

    .content {
        flex: 1;
        padding: 20px;
    }

    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
        margin-bottom: 20px;
    }

    label {
        display: inline-block;
        width: 200px;
        padding: 20px;
    }

    input[type="text"] {
        width: 300px;
        height: 40px;
    }

    textarea {
        width: 450px;
        height: 100px
    }

    h1 {}

    .page-content {
        background-color: #f4f5f7;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .content {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: 600;
    }

    .div_deg {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        height: 150px;
        resize: vertical;
    }

    img {
        display: block;
        margin: 10px 0;
        max-width: 150px;
        height: auto;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    button:hover {
        background-color: #0056b3;
    }

</style>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="content">
                <h1>Veuillez modifier le produit</h1>
                <div class="div_deg">
                    <form action="{{ route('edit_product', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" value="{{ $data->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" required>{{ $data->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="number" name="price" value="{{ $data->price }}" required step="0.01">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantité</label>
                            <input type="number" name="quantity" value="{{ $data->quantity }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Catégorie</label>
                            <select name="category_id" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image">
                            @if($data->image)
                            <img src="{{ asset('products/'.$data->image) }}" alt="Product Image">
                            @endif
                        </div>

                        <button type="submit">Mettre à jour le produit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @include('admin.js')
    <!-- JavaScript files-->

</body>
</html>
