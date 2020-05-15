<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;


/**
 *
 */
class PocetnaController extends Controller
{

  public function index()
  {
    $artikli=Article::paginate(9);

    $tbPretraga="";
    $brojac=0;
    $data=array(
      'artikli'=>$artikli,
      'pretraga'=>$tbPretraga,
      'brojac'=>$brojac
    );
    return view('pocetna')->with($data);
  }

  public function pretraga(Request $request)
  {



    $tbPretraga=$request->input('tbPretraga');
    $brojac=0;
    switch($request->input('button')){

    case 'submit':
    if($tbPretraga=="")
    {
      $artikli=Article::paginate(9);
      $data=array(
        'artikli'=>$artikli,
        'pretraga'=>$tbPretraga,
        'brojac'=>$brojac
      );

    }
    else {
      $artikli=Article::search($tbPretraga);
      $data=array(
        'artikli'=>$artikli,
        'pretraga'=>$tbPretraga,
        'brojac'=>$brojac
      );


    }


        return view('pocetna')->with($data);

        break;


      case 'reset' :
      $artikli=Article::paginate(9);
      $data=array(
        'artikli'=>$artikli,
        'pretraga'=>$tbPretraga,
        'brojac'=>$brojac
      );
      return view('pocetna')->with($data);
      break;

  }
} //kraj funkcije
}











 ?>
