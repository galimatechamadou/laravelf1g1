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
<div class="row">
    <div class="col-12">
        <div id="msg">Nous allons changer ce text avec Ajax. Cliquez sur ke bouton</div>
        <div>
            <form action="">
                <button type="submit" class="btn btn-primary" id="changeur">Remplacer le text</button>
            </form>
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script !src="" defer>
    let btn = document.getElementById('changeur');
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        alert("Ici");
        $.ajax({
            type: "POST",
            url: '/getmsg',
            data: "_token=<?php echo csrf_token() ?>",
            success: function(data){
                $("#msg").html(data.msg);
            }
        });
    })
    function getMessage(){
        $.ajax({
            type: "POST",
            url: '/getmsg',
            data: "_token=<?php echo csrf_token() ?>",
            success: function(data){
                $("#msg").html(data.msg);
            }
        });
    }
</script>
@endsection
