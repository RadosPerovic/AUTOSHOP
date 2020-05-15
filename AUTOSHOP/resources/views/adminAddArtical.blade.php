@extends('admin.layout')

@section('content')

<center class="row" style="margin-top:20px;"> <!-- podela prikaza -->
<div class="col-md-12">

      <h2 class="page-header">
        <strong>Unesi artikal</strong>
      </h2>
      @if (session('alert'))
          <div class="alert alert-success">
              {{ session('alert') }}
          </div>
      @endif
      <br>

      <form method="post" name="form" action="{{route('postAddArticle')}}" style="width:400px;" onsubmit="return validateForm()">
        @csrf<!-- pocetak forme -->
        <div class="form-group">
          <label for="naziv">Naziv</label>
          <input type="text" class="form-control" id="naziv" name="naziv" value="{{$artikal->naziv}}" placeholder="Unesite naziv aritkla">
        </div>
        <div class="form-group">
          <label for="cena">Cena</label>
          <input type="number" class="form-control" id="cena" value="{{$artikal->cena}}" name="cena" placeholder="Unesite cenu artikla u dinarima">
        </div>
        <div class="form-group">
          <label for="marka">Marka</label>
          <input type="text" class="form-control" id="marka" name="marka" value="{{$artikal->marka}}" placeholder="Unesite marku artikla">
        </div>
        <div class="form-group">
          <label for="kolicina">Kolicina</label>
          <input type="number" class="form-control" id="kolicina" name="kolicina" value="{{$artikal->kolicina}}" placeholder="Unesite kolicinu artikla">

        </div>
        <div class="form-group">
          <label for="opis">Opis</label>
            <textarea class="form-control" rows="5" id="opis" name="opis" >{{$artikal->opis}}</textarea>
        </div>

        <button type="submit" name="button" value="{{$isNew}}" class="btn btn-danger btn-lg btn-block">Sacuvaj</button>
        <div class="form-group" style="visibility:hidden">
          <label for="id">Kolicina</label>
          <input type="number" class="form-control" id="id" name="id" value="{{$artikal->id}}" placeholder="Unesite kolicinu artikla">

        </div>
      </form> <!-- kraj forme -->
    </div>

  </center>

<script>

function validateForm() {
  var x = document.forms["form"]["naziv"].value;
  var y = document.forms["form"]["cena"].value;
  var c = document.forms["form"]["marka"].value;
  var d = document.forms["form"]["kolicina"].value;
  var p = document.forms["form"]["opis"].value;
    if (x == "" || y=="" || c=="" || d=="" || p=="") {
    alert("Sva polja moraju biti popunjena");
    return false;
  }



}


</script>


  @endsection
