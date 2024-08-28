<!DOCTYPE html>
<html lang="en">
@include('admin.css')
<style type="text/css">
    .form-container {
        max-width: 600px;
        /* Limiter la largeur du formulaire */
        margin: 20px auto;
        /* Centrer le formulaire horizontalement */
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h1 {
        text-align: center;
        color: #007bff;
        margin-bottom: 20px;
    }

    .input_deg {
        margin-bottom: 15px;
        /* Réduit l'espacement entre les champs */
    }

    .input_deg label {
        font-size: 14px;
        font-weight: 500;
        color: #495057;
        display: block;
        margin-bottom: 5px;
    }

    .input_deg input,
    .input_deg textarea,
    .input_deg select {
        width: 100%;
        padding: 8px;
        /* Réduit le padding pour les champs */
        border-radius: 4px;
        border: 1px solid #ced4da;
        box-sizing: border-box;
    }

    .input_deg input[type="file"] {
        padding: 3px;
        border: none;
    }

    .input_deg textarea {
        resize: vertical;
        min-height: 80px;
        /* Réduit la hauteur minimale des zones de texte */
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #ffffff;
        padding: 10px 15px;
        /* Ajuste le padding du bouton */
        font-size: 14px;
        border-radius: 4px;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-success:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        outline: none;
    }

</style>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="form-container">
                <h1>Veuillez ajouter un produit</h1>

                <!-- Formulaire d'ajout de produit -->
                <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                        <label>Titre du produit</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="input_deg">
                        <label>Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="input_deg">
                        <label>Prix</label>
                        <input type="text" name="price" required>
                    </div>
                    <div class="input_deg">
                        <label>Quantité</label>
                        <input type="number" name="qty" required>
                    </div>
                    <div class="input_deg">
                        <label>Catégorie de produit</label>
                        <select name="category_id" required>
                            <option value="">Sélectionnez une option</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_deg">
                        <label>Image du produit</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="input_deg text-center">
                        <input class="btn btn-success" type="submit" value="Ajouter un produit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.js')
</body>
</html>
