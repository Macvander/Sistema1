<!DOCTYPE html>
<html >
	<head>
		<script type="text/javascript" src="{{asset('/js/jquery-2.1.3.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/angular.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/angular-route.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/controller.js')}}"></script>
	</head>
	<body ng-app='app'>
	 	<form ng-controller='pruebaController' action="listar" method="post" name="form1">

	 		<input type="hidden" ng-model='_method' name="_method" value="POST">
	 		<input type="hidden" ng-model='_token' name="_token" value="{{ csrf_token() }}">
	 		<table align="center">
	 			<tr>
	 				<td><label>Nombre:</label></td>
	 				<td><input type="text" ng-model='producto.nombre' name="nombre"></td>
	 			</tr>
	 			<tr>
	 				<td><label>Marca:</label></td>
	 				<td><input type="text" ng-model='producto.marca' name="marca"></td>
	 			</tr>
				<tr>
	 				<td><label>Precio:</label></td>
	 				<td><input type="text" ng-model='producto.precio' name="precio"></td>
	 			</tr>
				<tr>
	 				<td><label>Stock:</label></td>
	 				<td><input type="text" ng-model='producto.stock' name="stock"></td>
	 			</tr>				 
		 		<tr>
		 			<td colspan="2" align="center"><input type="button"  onclick="" ng-click='enviar()' value="Enviar" name="enviar1"></td>
		 		</tr>
		 		
	 		</table>
	 	</form>
	</body>

</html>