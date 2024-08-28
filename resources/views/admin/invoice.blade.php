<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre de la page</title>
    <!-- Lien vers les feuilles de style CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
        <h3>Customer name: {{$order->name}}</h3>
        <h3>Customer address: {{$order->rec_address}}</h3>
        <h3>Customer phone: {{$order->phone}}</h3>
        <h2>product title: {{$order->product->title}}</h2>
        <h2>product price: {{$order->product->price}}</h2>

        <img height="250" width="300" src="products/{{$order->product->image}}">
        
    </center>
</body>
</html>
