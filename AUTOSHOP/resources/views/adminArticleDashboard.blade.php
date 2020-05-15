@extends('admin.layout')

@section('content')
<center>
<h2 class="page-header">
  <strong>Artikli</strong>
</h2>
</center>
<div style="height:500px; width:auto;">
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


<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Naziv</th>
      <th scope="col">Cena</th>
      <th scope="col">Marka</th>
      <th scope="col">Opis</th>
      <th scope="col">Kolicina</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


  <?php foreach($artikli as $artikal) { ?>
    <form method="post" action="{{route('editArticle', $artikal->id)}}">
          @csrf
    <tr>

      <th scope="row">{{$artikal->id}}</th>
        <td>{{$artikal->naziv}}</td>
        <td>{{$artikal->cena}}</td>
        <td>{{$artikal->marka}}</td>
        <td>{{$artikal->opis}}</td>
        <td>{{$artikal->kolicina}}</td>

        <td><button type="submit" name="button" style="width:100px;  margin-right:40px;" value="edit" id="{{$artikal->id}}" class="btn btn-warning">Edit</button><button onclick="return confirm('Da li ste sigurni da zelite obrisati artikal?')"  id="delete{{$artikal->id}}" type="submit" name="button" value="delete" style="width:100px" class="btn btn-danger">Delete</button></td>

    </tr>

  </form>

  <?php } ?>
  {{$artikli->links()}}


  </tbody>
</table>


</div>








  @endsection
