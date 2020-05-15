
<h2 class="page-header" style="margin-left:auto;">
  <strong>Korpa</strong>
</h2>
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
@if (session('alert2'))
    <div class="alert alert-danger">
        {{ session('alert2') }}
    </div>
@endif
<br>
<div class="row row-cols-1 row-cols-md-1" id="scroll" style="margin-top:20px; height:auto; background-color: #343a40;
    width: auto;
    margin: 0px;
    padding-top: 20px;
    height: 660px;
    overflow: auto;">


  <?php $brojacInput=1000;
        $brojacLabel=2000;
        $brojacButton=5000;
  $ukupanZbir=0;
  //brojac za input id i ispis(labela)?>
<?php
foreach($artikli as $artikal) {
   //$artikli su u kontroleru 'artikli'?>
   <form method="post" action="{{route('updateCart',$artikal->id)}}">
     @csrf
<div class="col mb-12" style="margin-bottom:10px; display:inline-block;">
 <div class="card">

      <div class="card-body" style="display:inline;">

         <h3 class="card-title">Naziv: {{$artikal->name}}</h3>

         <h4 style="color:red;" id="cena" class="card-title">Cena: {{number_format($artikal->price,2)}}. dinara </h4>
         <h5 class="card-text">Marka: {{$artikal->attributes->marka}}</h5><br>
         <p class="card-text">Kolicina: <input type="number" id="{{$artikal->id}}" name="{{$artikal->id}}" min="1" max="99" value="{{$artikal->quantity}}"  style="margin-right:50px; width: 150px;">
             <button type="submit" class="btn btn-primary" name="button" value="update" id="{{$brojacButton}}" style="width:150px;align:center; margin-right:50px;">Azuriraj</button>
             <?php $ukupno=$artikal->quantity*$artikal->price; ?>
             <label name="iznos" id="{{$brojacLabel}}" style="margin-right:180px; width:200px">Zbir: {{number_format($ukupno,2)}}. dinara</label>
             <button type="submit" class="btn btn-danger" name="button" value="delete" id="delete" style="width:150px;align:center;">Izbaci iz korpe</button>
         </p>
         <?php $ukupanZbir+=$ukupno; ?>

      </div>
 </div>
</div>
</form>
<?php $brojacInput++;
      $brojacLabel++;
      $brojacButton++; ?>
<?php } ?>


</div>

<div class="col mb-12" style="margin-bottom:10px; margin-top:20px; display:inline-block;">

 <div class="card">

      <div class="card-body" style="display:inline;">

         <h3 id="ukupanIznos" class="card-title">Ukupno:    {{number_format($ukupanZbir,2)}} . dinara</h3>


 </div>
</div>
</div>


@include('cart/narudzbenica')
