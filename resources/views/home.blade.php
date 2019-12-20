@extends('layouts.design')
@section('title', "Page d'accueil")
@section('content')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://source.unsplash.com/1600x900/?interior" class="d-block w-100" alt="..."/>
                        <div class="carousel-caption d-none d-md-block">
                            <a href="#" class="nav-link"><h5>Produit disponible</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Consectetur quod officiis iusto!
                                </p></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://source.unsplash.com/1600x900/?shoes" class="d-block w-100" alt="..."/>
                        <div class="carousel-caption d-none d-md-block">
                            <a href="#" class="nav-link"><h5>Autre produit</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quae delectus accusamus quidem nostrum eum enim nam rem?
                                    Neque ea iste commodi quis voluptatem iusto, minus quod
                                    quas, ratione esse nihil!
                                </p></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                abonnement/expired        <img src="https://source.unsplash.com/1600x900/?computer" class="d-block w-100" alt="..."/>
                        <div class="carousel-caption d-none d-md-block">
                            <a href="#" class="nav-link"><h5>Encore produit</h5>
                                <p>
                                    Nulla vitae elit libero, a pharetra augue mollis interdum.
                                </p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <h2>Nos derniers produits</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{$product->images ?? asset('uploads/images/default.png')}}" height="250" width="250" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{$product->name}}</a>
                    </h4>
                    <p class="card-text">{!! \Illuminate\Support\Str::words($product->description, 25,'....')  !!}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            <nav aria-label="...">{{$products->links()}}</nav>
        </div>
    </div>
</div>
@endsection
