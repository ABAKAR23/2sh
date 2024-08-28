<!DOCTYPE html>
<html lang="en">
@include('admin.css')
<style type="text/css">
    input[type='text'] {
        width: 100%;
        max-width: 400px;
        height: 50px;
        box-sizing: border-box;
    }

    .main-container {
        display: flex;
        flex-wrap: wrap;
    }

    .sidebar {
        flex: 0 0 250px;
        /* Ajustez cette largeur selon les besoins */
        max-width: 100%;
    }

    .content {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
    }

    .form-container {
        margin-bottom: 20px;
    }

    .table-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
        font-size: 18px;
        font-weight: bold;
    }

    td {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .btn-custom {
        padding: 8px 12px;
        font-size: 14px;
    }

    .btn-edit {
        background-color: #28a745;
        color: white;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    @media (max-width: 1024px) {
        .sidebar {
            flex: 0 0 200px;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .content {
            padding: 10px;
        }

        table,
        th,
        td {
            font-size: 14px;
        }

        .btn-custom {
            padding: 6px 10px;
            font-size: 12px;
        }
    }

    @media (max-width: 576px) {
        .sidebar {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .content {
            padding: 10px;
        }

        th,
        td {
            font-size: 12px;
            padding: 10px;
        }

        .btn-custom {
            padding: 6px 8px;
            font-size: 10px;
        }
    }

</style>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch main-container">
        @include('admin.sidebar')
        <div class="page-content content">
            <h1 class="mb-4">Ajouter Une Catégorie</h1>
            <div class="form-container">
                <form action="{{ url('add_category') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="category" class="form-control" placeholder="Nom de la catégorie">
                        <div class="input-group-append">
                            <input class="btn btn-primary btn-custom" type="submit" value="Ajouter une catégorie">
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégorie</th>
                            <th>Éditer</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>
                                <a class="btn btn-edit btn-custom" href="{{ url('edit_category', $item->id) }}">Éditer</a>
                            </td>
                            <td>
                                <a class="btn btn-delete btn-custom" onclick="confirmation(event)" href="{{ url('delete_category', $item->id) }}">Supprimer</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.js')
</body>
</html>
