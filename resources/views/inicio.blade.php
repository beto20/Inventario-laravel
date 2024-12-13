
@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header text-white" align="center" >
    <h2>Panel de Control</h2>
  </div>
  <div class="card-body">

  <div class="grey-bg container-fluid" ¿>
  <section id="minimal-statistics">
    &nbsp;
    @if(Auth::user()->isAdmin())
      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12"> 
          <div class="card bg-info text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-building fa-5x primary font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Centros de Trabajo</span>
                      <h3>{{ $conteo }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-primary text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-users fa-5x success font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Proveedores</span>
                      <h3>{{ $conteoPv }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-success text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-outdent fa-5x danger font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Categorías</span>
                      <h3>{{ $conteoC }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-warning text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-archive fa-5x warning font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Productos</span>
                      <h3>{{ $conteoP }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <br>
      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-dark text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-indent fa-5x warning font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Artículos en el Inventario</span>
                      <h3>{{ $conteoIn }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-danger text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-archive fa-5x warning font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Existencia Total</span>
                      <h3>{{ $conteoA }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-info text-white">
            <div class="card-content">
              <div class="card-body">
              <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-bar-chart fa-5x warning font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Facturas Totales</span>
                      <h3>{{ $conteoF }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-primary text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="fa fa-money fa-5x warning font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                        <span>Presupuesto Total</span>
                        <h3>$ {{ $totalFa }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-success text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-outdent fa-5x danger font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Categorías</span>
                      <h3>{{ $conteoC }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-warning text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-archive fa-5x warning font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Productos</span>
                      <h3>{{ $conteoP }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-info text-white">
            <div class="card-content">
              <div class="card-body">
              <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fa fa-bar-chart fa-5x warning font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                      <span>Facturas Totales</span>
                      <h3>{{ $conteoF }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card bg-primary text-white">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="fa fa-money fa-5x warning font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                        <span>Presupuesto Total</span>
                        <h3>$ {{ $totalFa }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </section>
  </div>

  </div>
</div>



@endsection