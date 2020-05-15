<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Auth;
use DB;

class RegistracijaController extends Controller
{
  public function getSignup()
  {

    return view('registration-signup');
  }

  public function postSignup(Request $request)
  {
    // $this->validate($request, [
    //   'email'=>'email|required|unique:users',
    //   'password'=>'required|min:4'
    // ]);
    //
    // $user=new User([
    //   'email'=>$request->input('email'),
    //   'password'=>sha1($request->input('password'))
    // ]);
    //
    // $user->save();
    //
    // return redirect()->route("routeGET");   //problem-nece da se rutuje posle submit-a na pocetnu stranu!

    $this->validate($request, [
     'email'=>'email|required|unique:users',
  'password'=>'required|min:4'
    ]);


    $user=new User([
      'email'=>$request->input('email'),
      'password'=>$request->input('password')
    ]);

    // DB::table('users')->insert($user); // mora biti array

$user->save();
return redirect()->route("routeGET");
  //  echo "Record inserted successfully.<br/>";  //suvisno





  }


  public function getSignin()
  {

    return view('registration-signin');
  }


  public function postSignin(Request $request)
  {
      $this->validate($request, [
        'email'=>'email|required',
        'password'=>'required|min:4'
      ]);

    if( Auth::attempt(['email'=>$request->input('email'), 'password'=>sha1($request->input('password'))]))
    {
      //return redirect()->route('user.profil');
      echo "<p>radi</p>";
    }
    echo "<p>ne radi</p>";




  //  return redirect()->back();
  }


  public function getUser()
  {
    return view('user.profil');
  }






}
