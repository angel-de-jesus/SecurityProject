@extends('layouts.app')
<link rel="stylesheet" href="../css/mapa.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<html>
    <head>
    <script type='text/javascript'>
      var centreGot = false;
    </script>
      {!! $map['js'] !!} 
    </head>
    <body style="background-color:white">
  @section('content')
  <div class="row3">
    <div class="col-sm-12 col-md-12 " >
        <section class="content">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Error!</strong> Revise los campos obligatorios.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-info" style="visibility:hidden">
              {{Session::get('success')}}
            </div>
            @endif
            <div class="row  as justify-content-center">
                <form method="POST" action="{{ route('home.store') }}" role="form" id="inp">
                    {{ csrf_field() }}
                    
                      <div class="form-group">
                        <input type="text" name="lat" id="lat" class="btn_input form-control" style="visibility:hidden"
                          placeholder="Latitude" required>
                      </div>
                      <div class="form-group">
                        <input type="text" name="ing" id="ing" class="btn_input form-control" style="visibility:hidden"
                          placeholder="Longitud"  required>
                        </div>
                        <div class="form-group">
                        <strong><label for="" style="font-size=50pt">Datos de registro:</label></strong>
                        <input type="text" name="name" id="name" class="btn_input form-control" placeholder="Nombre del lugar" required>
                        <br>
                        </div>
                        <div class="form-group">
                            <textarea name="coment" id="coment" class="btn_input form-control"style="resize:none" placeholder="Comentario" required></textarea>
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Guardar"  class="btn btn-success btn-responsive">
                        </div>
                
                  </form>
            </div>

          </section>
    </div>
 
<div class="container-fluid">
  <div class="row justify-content-md-center  ">
    <div class="col-sm-12 col-md-6">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
        <br>
          <div class="form-group">
            <strong><label for=""style="font-size:14pt">Buscar Lugar: </label></strong>
            <input type="text" class="form-control" id="bsc" placeholder="Nombre del lugar"/>
            <strong><label for="" style="font-size:12pt">Dar click en el mapa para seleccionar una ubicacion </label></strong>
          </div>
          <div class="form-group a display:flex">
            {!! $map['html'] !!}
          </div>
    </div>

    <div class="col-sm-4 b col-md-6">
      <br><br>
      <hr><h1>Comments</h1><hr>

        @php( $coords = \App\Home::all() )
        @if($coords->count())
          <div id="carouselExampleControls" class="carousel slide container-blog " data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach($coords as $coord )
              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
              @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
              @foreach($coords as $coord)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="item-box-blog">
                <div class="card-body">
                  <h5 class="comentario"><strong>Nombre del lugar:</strong></h5>
                  <h6 class="card-title" style="text-align:center;">{{$coord->name}}</h6>
                  <h5 class="comentario"><strong>Comentario:</strong></h6>
                  <h6 class="card- mb-2 text-muted" style="text-align:center;">{{$coord->coment}}</h6>
                  <h5 class="comentario"><strong>Usuario:</strong></h6>
                  <p class="card-text" style="text-align:center;">{{$coord->user}}</p>
                  
                </div>
                </div>
            </div>
              @endforeach
          </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
          </div>
          @else
          <tr>
            <td colspan="8">No hay Comentarios!!</td>
          </tr>
          @endif
    </div>

  </div>
</div>
@endsection
</body>

<script>
  function coordenadas(a) {
    alert("usted selecciono un lugar");
    let lat = document.getElementById('lat').value = a;

    //alert(a);

    //alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());
  }
  function coordenadas2(b) {
    let lat = document.getElementById('ing').value = b;

    //alert(b);

    //alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());
  }


</script>

</html>

<style>
  body {
    background-image: url("https://image.freepik.com/foto-gratis/fondo-textura-papel-gris-claro-blanco_7190-913.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

  @media (max-width: 415px) {
  

/*     .row2 {
      width: 345px;

    } */

    .row {
      width: 100% !important;

    }

    .card {
      width: 50%
    }

    #bsc {
      margin-left: 18px;
    }

    .btn_input {
      margin-left: 20% !important;

    }
    .a{
       margin-left:30px;
    }
    .b{
      margin-left:50 px !important;
      padding-left: 50px !important;
    }
  
    

  }


  #inp {
    margin: 70px;
    margin-left: 35px;
  }

  /* .btn_input{
  margin-left:520px;
} */
</style>