<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Auth;
use App\Order;
use App\Orders_artikal;
use Cart;

class CartController extends Controller
{
   public function add(Request $request)
   {
    // if(!is_null(auth()->user())) umesto IF-a koristim middleware!
  ///   {
    $userID=auth()->user()->id;
    $article=Article::find($request->input('id'));
    if( !is_null($articleInSession=Cart::session($userID)->get($article->id)))  //provera da li postoji artikal u korpi
      {
        if(($articleInSession->quantity + $request->input($article->id) ) <= $articleInSession->attributes->naStanju)  //provera stanja u magacinu
          {
              Cart::session($userID)->update($article->id,array(
              'quantity'=>$request->input($article->id)   ) );

              return redirect()->route('routeGET')->with('alert', "Uspesno ste dodali artikal u korpu");
          }
        else {

            return redirect()->route('routeGET')->with('alert2',"Artikal ste vec dodali u korpu, i njegova prethodna kolicina se sabira sa izabranom kolicinom, ali nema toliko artikla na stanju u magacinu!" );

            }
//  return redirect()->route('routeGET');
      }
  else{
     if($request->input($article->id)<=$article->kolicina)  //provera stanja
     {
       Cart::session($userID)->add(array(
       'id'=>$article->id,
       'name'=>$article->naziv,
       'price'=>$article->cena,
       'quantity'=>$request->input($article->id),
       'attributes'=>array('opis'=>$article->opis,
                            'marka'=>$article->marka,
                            'naStanju'=>$article->kolicina
                            )
     ));
     echo "<script>";
     echo "alert('Uspesno ste dodali artikal u korpu!');";
     echo "</script>";
     return redirect()->route('routeGET')->with('alert','Uspesno ste dodali artikal u korpu!' );

     }

     else{
        return redirect()->route('routeGET')->with('alert2','Artikla nema na stanju u trazenoj kolicini!' );
        }
      }
  }  //kraj add funckije

       public function index()
       {

         $userID = auth()->user()->id; // or any string represents user identifier
         if(!is_null(Cart::session($userID)->getContent()))
         {
         $data=array(
           'artikli'=>Cart::session($userID)->getContent()

         );
       }
       else{

         Cart::session($userID)->add(array(
            'id'=>0,
            'name'=>"",
            'price'=>0,
            'quantity'=>0,
            'attributes'=>array('opis'=>"",
                                 'marka'=>"")));


             $data=array('artikli'=>Cart::session($userID)->getContent());
       }
         return view('cart')->with($data);




     } //kraj add funckije


     public function update(Request $request, $id)
     {

       switch($request->input('button'))
       {
         case 'update':
        $userID = auth()->user()->id;
        $article=Cart::session($userID)->get($id);
        if($request->input($id) <= $article->attributes->naStanju)
        {
        Cart::session($userID)->update($id,array(
         'quantity'=>$request->input($id)-$article->quantity) );
        }
        else{
              return redirect()->route('cart')->with('alert2','Artikla nema na stanju u trazenoj kolicini!' );
          }
        $data=array('artikli'=>Cart::session($userID)->getContent());
         return view('cart')->with($data);
           break;

          case 'delete':
          $userID = auth()->user()->id;
          Cart::session($userID)->remove($id);
          $data=array('artikli'=>Cart::session($userID)->getContent());
          return view('cart')->with($data);
          break;

        }

     }


     public function order(Request $request)
     {
        $userID=auth()->user()->id;
        $korpa =Cart::session($userID)->getContent();
        if($korpa->count()==0)
        {
          $data=array('artikli'=>Cart::session($userID)->getContent());
          return redirect()->route('cart')->with('alert2', "Narudzbina nije uspela, korpa je prazna");
        }
        else{
              $order=new Order;
              $order->nacin_preuzimanja=$request->input('r_method');

                $order->adresa=$request->input('adresa') . ", " . $request->input('grad');

                $order->ukupna_vrednost=$request->input('ukupno');
                $order->id_user=$userID;
              $order->datum_narucivanja=now()->toDateTimeString();
              $order->save();



              foreach($korpa as $artikal)
              {
                $order_article=new Orders_artikal;
                $lastOrder=Order::orderBy('id', 'desc')->first();
                $order_article->id_order=$lastOrder->id;
                $order_article->id_artikal=$artikal->id;
                $order_article->kolicina=$artikal->quantity;
                $order_article->jedinicna_cena=$artikal->price;
                $order_article->ukupna_vrednost=$artikal->quantity*$artikal->price;

                $artikalPromenaStanja=Article::where('id', $artikal->id)->first();
                $naStanju=$artikalPromenaStanja->kolicina;
                $artikalPromenaStanja->kolicina=$naStanju-$artikal->quantity;   //promena kolicine narucenig artikla u magacinu

                $order_article->save();
                $artikalPromenaStanja->save();
              }

              Cart::session($userID)->clear();
              $data=array('artikli'=>Cart::session($userID)->getContent());
              return redirect()->route('cart')->with('alert', "Uspesno ste narucili vase proizvode. Hvala na poverenju!");
            }






      //  return view('cart')->with($data);

     } //kraj order funkcije


}
