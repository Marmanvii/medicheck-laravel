@extends('layout.master')
@section('content')

<div class="container">
  

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/images/imagen1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id placerat libero</h1>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/images/imagen2.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <h1>Suspendisse potenti. In ut sagittis lacus</h1>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/images/imagen3.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
            <h1>Sed eget molestie ex, eu ornare nulla</h1>
          </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br>
  <h4><center>NOTICIAS</center></h4> <!--Sección de noticias -->
  <br>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l3">
          <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      
      <div class="col s12 m12 l3">
          <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      
      <div class="col s12 m12 l3">
          <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      
    </div>
  </div>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="http://localhost:8000/"> medicheck.cl</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</div>

@endsection

<script>
  <script src={{ asset('js/home.js') }}></script>
</script>