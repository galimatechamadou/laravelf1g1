@extends('layouts.design')
@section('title', "Page d'accueil")
@section('content')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliderProducts as $key => $product)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key == 0?'active':''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliderProducts as $key => $product)
                        <div class="carousel-item {{$key == 0 ?"active":''}}">
                            <img src="{{$product->images ? asset($product->images) : asset('uploads/images/default.png')}}" class="d-block w-100" alt="{{$product->name}}"/>
                            <div class="carousel-caption d-none d-md-block">
                                <a href="#" class="nav-link"><h5>{{$product->name}}</h5>
                                    <p>
                                        {!! $product->description !!}
                                    </p></a>
                            </div>
                        </div>
                    @endforeach
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
                <a href="/produit/{{$product->slug}}/show"><img class="card-img-top" src="{{$product->images ?? asset('uploads/images/default.png')}}" height="250" width="250" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/produit/{{$product->slug}}/show">{{$product->name}}</a>
                    </h4>
                    <p class="card-text">{!! \Illuminate\Support\Str::words($product->description, 25,'....')  !!}</p>
                    <form action="#" id="{{'product_'.$product->id}}" class="add-to-cart">
                        @csrf
                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">cart.proudctsproudcts
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <button type="submit" class="btn btn-primary btn-fancy" href="/produit/{{$product->id}}/show">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{--<div>
            <nav aria-label="...">{{$products->links()}}</nav>
        </div>--}}
    </div>
</div>
@endsection
