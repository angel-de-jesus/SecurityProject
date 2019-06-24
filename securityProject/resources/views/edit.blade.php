
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
	body{
  background-image: url("https://image.freepik.com/foto-gratis/fondo-textura-papel-gris-claro-blanco_7190-913.jpg");
  background-position:center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
		/* body{
			/* background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover; 
		    background-color: #939177;
		} */
		.container{
			/* background-color:gray; */
			width:50%;
			opacity: .8;
		}

		.let2{
			color:black;
			/* font-size: 18px; */
			font-family: Arial, Helvetica, sans-serif;
		}

		.let{
			font-family: Arial, Helvetica, sans-serif;
			color:black;
		}

		.ka{
			border-radius: 10px;
		}
		@media (max-width: 415px) { 
			.container{
			
				width:450px;
				opacity: .8;
			}
			*{
				box-sizing:border-box;
			}
		}
		@media (max-width: 450px){ 
			.container{
				
				width:630px;
				opacity: .8;
			}
			form{
				width:766px;
			}
		
		}

		@media (max-width: 1366px){ 
			.container{
				h:;
				width:60px;
				opacity: .8;
			}
			form{
				width:66px;
			}
		
		}
		
	</style>

	<title>Editar Comentario</title>
</head>
<body >
	<br><br>
	<div class="container col-xs-12 col-sm-6 col-md-8" >
		<div class="row justify-content-center">					
			<form method="POST" action="{{ route('home.update',$coord->id) }}"  role="form">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">
				<div class="row justify-content-center">
						
					<div class="form-group">
						<strong><h2 style="text-align: center" class="let">Editar comentario</h2></strong><br>
						<strong><label for="" class="let2">Nombre del lugar:</label></strong><br>
						<input name="name" id='name' class="form-control input-sm" value="{{$coord->name}}"><br>
						<strong><label for="" class="let2">Comentario:</label></strong><br>
						<textarea type="text" name="coment" id='coment' cols="50" rows="10" class="ka" style="resize:none">{{$coord->coment}}</textarea> <br> <br>
						<input type="submit" style="margin-left: 35%" value="Actualizar" class="btn btn-success" id="boton">
					</div>								
				</div>
				</form>
			</div>
		</div>
</body>
</html>



<!-- {{auth()->user()->email}} -->
