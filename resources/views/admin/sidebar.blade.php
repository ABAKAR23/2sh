<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->

    <div class="avatar"><img src="{{asset('admincss/img/APP12709.jpg')}}" alt="..." class="img-fluid rounded-circle">
        {{-- <h1 class="h5">Kelley Abakar</h1> --}}
    </div>
    <div class="title">

        <p></p>
    </div>


    <ul class="list-unstyled">
        <li><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Acceuil </a></li>
        <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Categories </a></li>

        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Produits </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('add_product') }}">Ajout Produits</a></li>
                <li><a href="{{url('view_product')}}">Voir Produits</a></li>

            </ul>
        </li>

        <li><a href="{{url('view_orders')}}"> <i class="icon-grid"></i>Commandes</a></li>

</nav>
