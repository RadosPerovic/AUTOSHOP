<br>
<div class="row">
     <div class="col-md-12">
       <div id="detalji">
         <h2>Detalji narudžbenice:</h2>
         <form method="post" action="{{route('order')}}">
           @csrf
         <div class="grupa metoda">
           <label for="preuzimanje">Način isporuke:</label><br>
           <input type="radio" value="preuzimanje" name="r_method" id="preuzimanje" onclick="dontShow()" checked><label for="r-metod-preuzimanje">Licno preuzimanje (besplatno)</label><br>
           <input type="radio" value="dostava" name="r_method" id="dostava" onclick="show()"><label for="r-metod-postexpres">Dostava (za porudzbine preko 15.000 dostava je besplatna,u suprotnom se doplacuje 300 din po proizvodu)</label>
         </div> <br>
         <div id="divDostava" style="visibility:hidden;">
         <div class="grad">
           <label for="s-grad">Izaberite grad za isporuku:</label>
           <select id="s-grad" name="grad">
             <option value="">IZABERITE GRAD</option>
             <option value="Beograd">Beograd</option>
             <option value="Novi Sad">Novi Sad</option>
             <option value="Smederevo">Smederevo</option>
             <option value="Pancevo">Pancevo</option>
             <option value="Kragujevac">Kragujevac</option>
             <option value="Valjevo">Valjevo</option>
             <option value="Jagodina">Jagodina</option>
           </select> <br>
           <label for="adresa">Upisite adresu: </label>
           <input type="text" name="adresa" id="adresa" placeholder="npr: Gandijeva 21">
         </div>
       </div>
<br>

         <div class="grupa izracunavanja">
           <p>
             <label for="btn-izracunaj">Ukupna cena </label>
             <input type="text" name="ukupno" id="txt-izracunaj" readonly placeholder="0.00 dinara"> .dinara
           </p>

         </div>
         <br><br>
         <center>
                <button type="submit" class="btn btn-danger" style="width:350px; height:50px; align:center;">Naruci </button>

         </center>
       </form>
       </div>
     </div>
   </div>


   <script>
   function dontShow()
   {
     document.getElementById('divDostava').style.visibility ='hidden';
     izracunaj();
      }
   function show()
   {
     document.getElementById('divDostava').style.visibility ='visible';
     izracunaj();
   }
   function izracunaj()
   {
     if(document.getElementById('divDostava').style.visibility =='hidden')
     {
     document.getElementById('txt-izracunaj').value='{{number_format($ukupanZbir,2)}}';
   }
   else{
     <?php $userId=auth()->user()->id;
          $brojProizvoda= Cart::session($userId)->getTotalQuantity();
          $ukupno=0;
          if($ukupanZbir<15000) {
            $ukupanZbir+=$brojProizvoda*300;
          }?>
      document.getElementById('txt-izracunaj').value='{{number_format($ukupanZbir,2)}}';
   }

   }


izracunaj();

   </script>
