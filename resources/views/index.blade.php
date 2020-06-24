@include('layout._includes.top')

<title>MVC - Trabalho</title>
<!--Main Layout-->
<main>

    <div class="container">

        <!--Section: Products v.5-->
        <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">

            <div class="row">


                <div class="col-md-6">
                    <!-- Card Narrower -->
                    <div class="card card-cascade narrower">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img class="card-img-top" style="min-height: 180px!important;"
                                 src="{{asset('img/svg/modules/categoria.jpg')}}"
                                 alt="Card image cap">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">

                            <!-- Title -->
                            <h4 class="font-weight-bold card-title">Categoria de Produtos</h4>
                            <!-- Text -->
                            <p class="card-text">Permite o cadastro da Categoria de Produtos.</p>
                            <br>
                            <!-- Button -->
                            <a class="btn aqua-gradient" href="{{route('categoria.get_view')}}">Acessar</a>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Card Narrower -->
                    <div class="card card-cascade narrower">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img class="card-img-top" style="min-height: 180px!important;"
                                 src="{{asset('img/svg/modules/produto.jpg')}}"
                                 alt="Card image cap">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">

                            <!-- Title -->
                            <h4 class="font-weight-bold card-title">Produtos</h4>
                            <!-- Text -->
                            <p class="card-text">Permite o cadastro do produtos.</p>
                            <!-- Button -->
                            <br>
                            <a class="btn aqua-gradient" href="{{route('produto.get_view')}}">Acessar</a>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
</main>
@include('layout._includes.footer')
