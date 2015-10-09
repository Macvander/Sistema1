

var myApp=angular.module('app',['ngRoute']);


 
myApp.config(['$routeProvider',function($routeProvider){
 
 	$routeProvider.when("/", 
 	{
 
 		controller: "pruebaController",
 		templateUrl: "prueba.blade.php"
 
 	})
	.when("/",{
		controller:"maproductoController",
		templateUrl:"ma_producto.blade.php"
	})
 
 }]);

myApp.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
  });

myApp.controller('pruebaController',['$scope','$http',function($scope,$http){
	$scope.enviar=function(){
		$http.get('dial1').success(function(data){
			$scope.producto=data;
		});
	}
}]);

myApp.controller('maproductoController',['$scope','$http',function($scope,$http){
	$scope.lista=function(){
		$http.post('listar').success(function(data){
			var listaproducto=[];
			angular.forEach(data,function(value,key) {
 				//this.push({nombre:data.nombre,marca:data.marca,precio:data.precio,stock:data.stock });
				 this.push({nombre:value.nombre,marca:value.marca,precio:value.precio,stock:value.stock });
				},listaproducto);
				$scope.listaproducto=listaproducto;
		});
	}
}]);