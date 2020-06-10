@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Scentia | Entrevistas</title>
  </head>
  <body>
     
    
    <!--card  informativos-->
    <section id="enterview" class="mt-4 mb-4" style="padding-left:50px">

            <h2 style="text-align:center">Blog informativo</h2>
            <br>
        <div class="container-fluid ">
            <div class="row"> 
                <div  class="col-md-8 "> 
                    <div  class="card ml-3 mr-3" style="max-width: 100%; max-height: 100%">
                        <div class="row no-gutters">
                            <div class="col">
                                <img src="{{'img/claves_inven.png'}}" class="card-img"  >
                            </div>
                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="card-body ">
                                    <h3 class="card-title">Claves para un mejor inventariado</h3>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    <button type="button" class="btn btn-primary">Leer más...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div  class="card ml-3 mr-3" style="max-width: 100%; max-height: 100%">
                        <div class="row no-gutters">
                            <div class="col">
                                <img src="{{'img/justintime.png'}}" class="card-img"  >
                            </div>
                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="card-body ">
                                    <h3 class="card-title">Como se aplica la politica Just-in-Time</h3>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    <button type="button" class="btn btn-primary">Leer más...</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div  class="card ml-3 mr-3" style="max-width: 100%; max-height: 100%">
                        <div class="row no-gutters">
                            <div class="col">
                                <img src="{{'img/six_sigma.jpg'}}"  class="card-img"  >
                            </div>
                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="card-body ">
                                    <h3 class="card-title">¿Que es Six Sigma?</h3>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    <button type="button" class="btn btn-primary">Leer más...</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    
    </section>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
@endsection