<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


/**
 *
 */
class KontaktController extends Controller
{

  public function index()
  {
    return view('kontakt');
  }

  public function postIndex(Request $request)
  {

    return redirect()->route('kontakt')->with('alert',"Upesno ste poslali poruku. Nas admin tim ce vam odgovoriti u sto kracem vremenskom periodu. Hvala!" );
  }



}









 ?>
