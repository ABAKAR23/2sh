<!DOCTYPE html>
<html>

@include('home.css')

<style type="text/css">
    .div_center {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .detail-box {
        padding: 10px;
    }

</style>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <!-- début product section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>
            <div class="row">
                @foreach($product as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$product->title}}</h6>
                            <h6>Price <span>${{$product->price}}</span></h6>
                        </div>
                        <div style="padding:15px">
                            <a class="btn btn-danger" href="{{url('product_details', $product->id)}}">Detail</a>
                            <br>

                            <a class="btn btn-primary" href="{{url('add_cart',$product->id)}}">Add to cart</a>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- fin product section -->

    @include('home.footer')
</body>

</html>
