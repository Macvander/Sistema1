<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="{{asset('/js/jquery-2.1.3.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/angular.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/angular-route.js')}}"></script>
		<script type="text/javascript" src="{{asset('/js/controller.js')}}"></script>	
	</head>
	<body ng-app='app' ng-init="listaproducto1=[{marca:'rip curl',nombre:'camisa',precio:45.6,stock:2},{marca:'Lois',nombre:'pantalon',precio:78,stock:5}];">
		
		<div ng-controller='maproductoController' ng-init=''>
			<input type="button" value="Data" ng-click="lista()">
			<table>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Marca</th>
						<th>Precio</th>
						<th>Stock</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat='p in listaproducto'>
						<td>//p.nombre//</td>
						<td>//p.marca//</td>
						<td>//p.precio//</td>
						<td>//p.stock//</td>
					</tr>
				</body>
			</table>
		</div>
	</body>
</html>