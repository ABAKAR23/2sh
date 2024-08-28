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
    }

    input[type="text"] {
        width: 300px;
        height: 40px;
    }

</style>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="content">
            <h1 style="color:black;display: flex;justify-content: center;align-items: center;">Veuillez modifier la categorie</h1>
            <div class="div_deg">


                <form action="{{url('update_category',$data->id)}}" method="post">

                    @csrf
                    <input type="text" name="category" value="{{$data->category_name}}">
                    <input class="btn btn-primary" type="submit" value="Update Category">
                </form>
            </div>
        </div>
    </div>

    @include('admin.js')
    <!-- JavaScript files-->

</body>
</html>
