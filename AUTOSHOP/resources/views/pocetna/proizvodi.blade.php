
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

<!-- pocetak proizvoda -->

<div class="row row-cols-1 row-cols-md-3" id="scroll" style="margin-top: 10px; height:800px;">

  <?php
  foreach($artikli as $artikal) { //$artikli su u kontroleru 'artikli'?>

@include('pocetna.proizvodTemplate')


  <?php $brojac++;} //kraj foreach-a?>

<?php if($brojac==0) {?>
  <h2 style="color:white;">TRAZENA MARKA AUTA NE POSTOJI!</h2>
<?php } ?>
<div style="width:auto; height:50px; align=center;">



</div>



<script>


var brojac="{{count($artikli)}}";
document.getElementById("broj").innerHTML="Broj prikazanih proizvoda: " + brojac;

function doSomething()
{
  var tekst=document.getElementById("tbPretraga").value;
  if(tekst.lenght>0)
  {
    document.getElementById("btnPretrazi").disabled=false;
  }
  else {
      document.getElementById("btnPretrazi").disabled=false;


  }

  function brisiPretragu()
  {
    document.getElementById("f").value="";
  }
}



</script>



</div>

{{$artikli->links()}}
<!-- kraj proizvoda -->













<style media="screen">
#scroll {
  background-color: #343a40;
  width: auto;
  margin: 0px;
  padding-top: 20px;
  height: 660px;
  overflow: auto;
}
</style>
