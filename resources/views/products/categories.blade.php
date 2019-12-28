@extends('layouts.design')

@section('content')
    <div class="container pt-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="/produit/{{$product->category}}/show"><img class="card-img-top" src="{{$product->images ?? asset('uploads/images/default.png')}}" height="250" width="250" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="/produit/{{$product->category}}/show">{{$product->name}}</a>
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
