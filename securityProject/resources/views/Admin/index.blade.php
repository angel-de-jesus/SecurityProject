@extends('layouts.app')
<link rel="stylesheet" href="../css/mapa.css">
<html>
    <head>
    <script type='text/javascript'>
      var centreGot = false;
    </script>
      {!! $map['js'] !!} 
    </head>
<body>
  @section('content')
  <div class="row3">
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
			  <div class="alert alert-info">
				  {{Session::get('success')}}
			  </div>
      @endif				
				<form method="POST" action="{{ route('admin.store') }}"  role="form">
					{{ csrf_field() }}
						<div class="contenedorInputs">
							<div class="inputLatitud">
								<input type="text" name="lat" id="lat" class="btn_input" placeholder="Latitude">
							</div>
							<div class="inputLongitud">
									<input type="text" name="ing" id="ing" class="btn_input" placeholder="Longitud">
              </div>
              <div class="inputName">
								<input type="text" name="name" id="name" class="btn_input" placeholder="Nombre del lugar">
              </div>
              <div class="inputComentario">
                <textarea name="coment" id= "coment" class="btn_input" placeholder="Comentario"></textarea>
              </div>
						</div>
							<div class="contenedorBotones">
                <div class="btnGuardar">
								  <input type="submit"  value="Guardar" class="btn_guardar">
								</div>	
							</div>
        </form>  
    </section>
  <div class="container-fluid">
    <div class="row ">
      <div class="col">            
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
          <br>
          <label for="">Buscar Lugar: </label>&nbsp<input type="text" class="txt_input" id="myPlaceTextBox" />      
          <div class="row2">
            {!! $map['html'] !!}  
          </div>    
             
      </div>

    <div class="col2">
        <h1>Comments</h1>
<!--       @php( $coords = \App\Home::all() )                            
      @foreach($coords as $coord)
        <div class="card lop">
<td>{{$coord->id}}</td><br>
        <td>{{$coord->lat}}</td><br>
        <td>{{$coord->ing}}</td><br> 
        <div class="container">
          <h5 class="comentario"><strong>Nombre del lugar:</strong></h6><h6 class="comentario">{{$coord->name}}</h6><br>
          <h5 class="comentario"><strong>Comentario:</strong></h6><h6  class="comentario">{{$coord->coment}}</h6> <br>
          <h5 class="comentario"><strong>Usuario:</strong></h6><h6  class="comentario">{{$coord->user}}</h6> <br>
        </div>
        <td><a class="btn btn-primary btn-xs" href="{{action('HomeController@edit', $coord->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
        </div>
        <hr>
        @endforeach   -->
        <tbody>
              @if($admins->count())  
              @foreach($admins as $admin)  
              <tr>
                <td>{{$admin->name}}</td>
                <td>{{$admin->coment}}</td>
                <td>{{$admin->user}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('AdminController@edit', $admin->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AdminController@destroy', $admin->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>                          
         
      </div>
    </div>
</div> 
	@endsection
</body>

<script>
  function coordenadas(a){
    let lat = document.getElementById('lat').value=a;

    //alert(a);

    //alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());
  }
  function coordenadas2(b){
    let lat = document.getElementById('ing').value=b;

    //alert(b);

    //alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());
  }


</script>

</html>

 

 