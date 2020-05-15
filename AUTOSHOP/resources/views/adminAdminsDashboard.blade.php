@extends('admin.layout')

@section('content')
<center>
<h2 class="page-header">
  <strong>Super Admin</strong>
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
    <col width="50">
    <col width="100">
    <col width="100">
    <col width="100">
    <thead class="black white-text">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Naziv</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>

  <?php $brojac2=1; ?>
    <?php foreach($superadmini as $superadmin) { ?>
      <form method="post" action="">
            @csrf
      <tr>

        <th scope="row">{{$superadmin->id}}</th>
          <td>{{$superadmin->name}}</td>
          <td>{{$superadmin->email}}</td>


      </tr>

    </form>

    <?php $brojac2++;} ?>


    </tbody>
  </table>

<br><br><br><br><br><br>

<center>
<h2 class="page-header">
  <strong>Admini</strong>
</h2>
</center>

<div style="height:500px; width:auto;">

<table class="table">
  <col width="50">
  <col width="100">
  <col width="100">
  <col width="100">
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
  <?php foreach($admini as $admin) { ?>
    <form method="post" action="{{route('editAdmin', $admin->id)}}">
          @csrf
    <tr>

      <th scope="row">{{$admin->id}}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>

        <td><button type="submit" name="button" style="width:100px;  margin-right:40px;" value="edit" id="{{$admin->id}}" class="btn btn-warning">Edit</button><button onclick="return confirm('Da li ste sigurni da zelite obrisati artikal?')"  id="delete{{$admin->id}}" type="submit" name="button" value="delete" style="width:100px" class="btn btn-danger">Delete</button></td>

    </tr>

  </form>

  <?php $brojac++;} ?>


  </tbody>
</table>

</div>








  @endsection
