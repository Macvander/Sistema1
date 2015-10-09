<?php namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
//use Prueba;
use Graph;
use BarPlot;
class PruebaController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return 'jhjhj';
		return response()->json(array('valor'=>'8'));
		//echo json_encode(array('valor'=>9));
		//return view('prueba');
		//return Redirect::to('pruebita');
	}

	public function validacion(){
		return Redirect::to('pruebita');
	}

	public function db_dial()
	{
		 //$ubigeo = DB::select('select top(10) *from ubigeo');
		$ubigeo=DB::select('exec sp_combos @tipo=6');
        return view('lista', ['ubigeo' => $ubigeo]);
	}

	public function db_dial1()
	{
		 //$ubigeo = DB::select('select top(10) *from ubigeo');
		return json_encode(['marca'=>'rip curl','nombre'=>'camisa','precio'=>45.6,'stock'=>23]);
	}
	
	public function listarproducto()
	{
		//return json_encode([['marca'=>'rip curl','nombre'=>'camisa','precio'=>45.6,'stock'=>23],['marca'=>'lois','nombre'=>'pantalon','precio'=>78,'stock'=>56]]);
		return json_encode(array(array('marca'=>'rip curl','nombre'=>'camisa','precio'=>45.6,'stock'=>23),array('marca'=>'lois','nombre'=>'pantalon','precio'=>78,'stock'=>56)));
	}

	public function graficar()
	{

		//echo 'holanda';
		//require_once('C://wamp-2.5//wamp//www//laravel//app//helpers//prueba.class.php');
		//require_once('C://wamp-2.5//wamp//www//laravel//vendor//jpgraph//jpgraph//lib//JpGraph//src//jpgraph.php');
		//require_once('C://wamp-2.5//wamp//www//laravel//vendor//jpgraph//jpgraph//lib//JpGraph//src//jpgraph_bar.php');
		

		//echo $prueba=Prueba::getMensaje('gggg');
		$datay=[20,34,46,78,190,65,80,120,98,53,78,76];
		$datax=array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
		//JpGraph::module('line');

		$graph=new Graph(510,450,'auto');
		//$graph = new Graph(710,350,'auto');
		//$graph = new Graph(510,450,'auto');

		$graph->SetScale("textlin");
		$graph->img->SetMargin(60,30,10,30);
		$graph->yaxis->SetTitleMargin(45);
		$graph->yaxis->scale->SetGrace(40);
		$graph->SetShadow();

		// Turn the tickmarks
		$graph->xaxis->SetTickSide(SIDE_DOWN);
		$graph->yaxis->SetTickSide(SIDE_LEFT);

		// Create a bar pot
		$bplot = new BarPlot($datay);

		// Create targets for the image maps. One for each column
		$targ=array("bar_clsmex1.php#1","bar_clsmex1.php#2","bar_clsmex1.php#3","bar_clsmex1.php#4","bar_clsmex1.php#5","bar_clsmex1.php#6");
		$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
		$bplot->SetCSIMTargets($targ,$alts);
		$bplot->SetFillColor("orange");

		// Use a shadow on the bar graphs (just use the default settings)
		$bplot->SetShadow();
		$bplot->value->SetFormat("S/. %2.2f",70);
		$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
		$bplot->value->SetColor("blue");
		$bplot->value->Show();

		$graph->Add($bplot);

		$graph->title->Set("Ventas Mensuales Sucursal: ");
		$graph->xaxis->title->Set("X-Meses");
		$graph->yaxis->title->Set("Y-Ventas");
		$graph->xaxis->SetTickLabels($datax);
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

		// Send back the HTML page which will call this script again
		// to retrieve the image.
		//echo "";

		$graph->Stroke();
	}
}
