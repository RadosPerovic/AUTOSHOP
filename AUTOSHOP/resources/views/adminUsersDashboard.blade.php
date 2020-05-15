@extends('admin.layout')

  @section('content')
  <center>
  <h2 class="page-header">
    <strong>Korisnici</strong>
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



  <div style="height:500px; width:auto;">

  <table class="table">
    <col width="50">
    <col width="150">
    <col width="150">
    <col width="150">
    <thead class="black white-text">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Naziv</th>
        <th scope="col">Email</th>

          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

  <?php $brojac=1; ?>
    <?php foreach($users as $user) { ?>
      <form method="post" action="{{route('editUser', $user->id)}}">
            @csrf
      <tr>

        <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>

          <td><button type="submit" name="button" style="width:100px;  margin-right:40px;" value="edit" id="{{$user->id}}" class="btn btn-warning">Edit</button><button onclick="return confirm('Da li ste sigurni da zelite obrisati artikal?')"  id="delete{{$user->id}}" type="submit" name="button" value="delete" style="width:100px" class="btn btn-danger">Delete</button></td>

      </tr>

    </form>

    <?php $brojac++;} ?>


    </tbody>
  </table>

  </div>








    @endsection

</div>
