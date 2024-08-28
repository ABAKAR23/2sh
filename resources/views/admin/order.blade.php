<!DOCTYPE html>
<html lang="fr">
<head>
    @include('admin.css')
    <style type="text/css">
        table {
            border: 2px solid #007bff;
            /* Couleur bleue pour les bordures */
            text-align: center;
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #007bff;
            /* Couleur bleue pour l'en-tête */
            padding: 10px;
            font-size: 16px;
            /* Ajustez si nécessaire */
            font-weight: bold;
            color: white;
        }

        td {
            color: #343a40;
            /* Couleur sombre pour le texte des cellules */
            padding: 10px;
            border: 1px solid #dee2e6;
            /* Couleur grise claire pour les bordures des cellules */
            background-color: #f8f9fa;
            /* Couleur de fond des cellules */
            font-size: 14px;
            /* Ajustez si nécessaire */
        }

        td img {
            max-width: 100px;
            /* Limite la largeur de l'image */
            height: auto;
            /* Conserve les proportions de l'image */
            display: block;
            margin: 0 auto;
            /* Centre l'image */
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            overflow-x: auto;
            /* Permet de faire défiler horizontalement si nécessaire */
        }

        .button-group {
            display: flex;
            gap: 10px;
            /* Espace entre les boutons */
        }

        .btn {
            padding: 8px 12px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-warning {
            background-color: #ff9800;
            /* Orange vif pour "en cours" */
        }

        .btn-success {
            background-color: #28a745;
            /* Vert pour "livré" */
        }

        .btn-info {
            background-color: #17a2b8;
            /* Bleu clair pour "Imprimer le PDF" */
        }

        .btn-warning:hover,
        .btn-success:hover,
        .btn-info:hover {
            opacity: 0.8;
        }

        /* Pour les statuts */
        .status-in-progress {
            color: #ff9800;
            /* Orange pour "en cours" */
            font-weight: bold;
        }

        .status-on-the-way {
            color: #17a2b8;
            /* Bleu clair pour "en route" */
            font-weight: bold;
        }

        .status-delivered {
            color: #28a745;
            /* Vert pour "livré" */
            font-weight: bold;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #dee2e6;
            margin: 0 4px;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination .active span {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="table_center">
                <table>
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Image</th>
                            <th>Statut</th>
                            <th>Changer le statut</th>
                            <th>Imprimer le PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            @if($order->product)
                            <td>{{ $order->product->title }}</td>
                            <td>${{ number_format($order->product->price, 2) }}</td>
                            <td>
                                <img src="{{ asset('products/' . $order->product->image) }}" alt="Image du produit">
                            </td>
                            @else
                            <td colspan="3">Aucun produit disponible</td>
                            @endif
                            <td>
                                @if($order->status == 'en cours')
                                <span class="status-in-progress">{{ $order->status }}</span>
                                @elseif($order->status == 'en route')
                                <span class="status-on-the-way">{{ $order->status }}</span>
                                @else
                                <span class="status-delivered">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if($order->status == 'en cours')
                                <a href="{{ route('change_status', $order->id) }}" class="btn btn-warning">Marquer comme En route</a>
                                @elseif($order->status == 'en route')
                                <a href="{{ route('change_status', $order->id) }}" class="btn btn-success">Marquer comme Livré</a>
                                @else
                                <span class="text-success">Livré</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('print_pdf', $order->id) }}" class="btn btn-info">Imprimer le PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Ajout des liens de pagination -->
            <div class="pagination">
                {{ $data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
    @include('admin.js')
</body>
</html>
