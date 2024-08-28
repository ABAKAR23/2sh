<!DOCTYPE html>
<html lang="en">
@include('admin.css')
<style type="text/css">
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .search-form {
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .search-input {
        width: 100%;
        max-width: 500px;
        height: 40px;
        margin-bottom: 10px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .search-input:focus {
        border-color: #80bdff;
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .table-container {
        margin-top: 20px;
        padding: 0 20px;
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: center;
    }

    .table th {
        background-color: #007bff;
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    .table td {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #495057;
    }

    .table td.description {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
    }

    .table td.description:hover::after {
        content: attr(data-description);
        position: absolute;
        left: 0;
        top: 100%;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 5px;
        white-space: normal;
        z-index: 1000;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .btn-custom {
        padding: 8px 12px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
    }

    .btn-update {
        background-color: #28a745;
        color: white;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-update:hover,
    .btn-delete:hover {
        opacity: 0.9;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .img-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
    }

    @media (max-width: 1024px) {
        .search-input {
            max-width: 400px;
        }

        .table th,
        .table td {
            font-size: 14px;
            padding: 10px;
        }
    }

    @media (max-width: 768px) {
        .search-form {
            flex-direction: column;
        }

        .search-input {
            margin-bottom: 10px;
        }

        .table th,
        .table td {
            font-size: 12px;
            padding: 8px;
        }

        .img-thumbnail {
            width: 50px;
            height: 50px;
        }
    }

    @media (max-width: 576px) {
        .search-input {
            width: 100%;
            margin-bottom: 10px;
        }

        .table th,
        .table td {
            font-size: 10px;
            padding: 6px;
        }

        .img-thumbnail {
            width: 40px;
            height: 40px;
        }
    }
</style>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <form action="{{ url('product_search') }}" method="get" class="search-form">
                <input type="search" name="search" class="search-input" placeholder="Rechercher des produits...">
                <input type="submit" class="btn btn-secondary btn-custom" value="Recherche">
            </form>

            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre du produit</th>
                            <th>Description</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset('products/' . $product->image) }}" alt="Product Image" class="img-thumbnail" /></td>
                            <td>{{ $product->title }}</td>
                            <td class="description" data-description="{{ $product->description }}">{{ $product->description }}</td>
                            <td>{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><a href="{{ route('update_product', $product->id) }}" class="btn btn-success btn-update">Modifier</a></td>
                            <td><a href="{{ route('delete_product', ['id' => $product->id]) }}" class="btn btn-danger btn-delete" onclick="confirmation(event)">Supprimer</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.js')

    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            Swal({
                title: "Are You Sure to Delete this?"
                , text: "This delete will be permanent"
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
</body>
</html>
