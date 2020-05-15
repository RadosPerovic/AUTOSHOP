@extends('admin.layout')

@section('content')

<center class="row" style="margin-top:20px;"> <!-- podela prikaza -->
<div class="col-md-12">

      <h2 class="page-header">
        <strong>Unesi Usera/Admina</strong>
      </h2>
      @if (session('alert'))
          <div class="alert alert-success">
              {{ session('alert') }}
          </div>
      @endif
      <br>
      <?php if($isNew==0) { ?>
      <h4 class="page-header">
        <strong>Izmeni {{$role}}</strong>
      </h4>
    <?php } else{} ?>


      <form method="POST" name="form" id="form" action="{{route('postAddUserAdmin')}}" onsubmit="return validateForm()">
          @csrf

          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Naziv</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email adresa</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Sifra</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$user->password}}" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Ponovi sifru</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control"  value="{{$user->password}}" name="password_confirmation" required autocomplete="new-password">
              </div>
              <span id='message'></span>
          </div>

          <?php if($isNew==1){ ?>

          <div class="form-group row">
              <label style="color:red" for="radio" class="col-md-4 col-form-label text-md-right">Admin</label>

              <div class="col-md-6">
                  <input id="admin" type="radio" value="2"  class="form-control" name="radio" onclick="return changeAdmin()" >
              </div>
              <label style="color:red" for="radio" class="col-md-4 col-form-label text-md-right" >Korisnik</label>

              <div class="col-md-6">
                  <input id="user" type="radio" value="3" class="form-control" checked name="radio" onclick="return changeUser()"  >
              </div>

          </div>
        <?php } else {} ?>


          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary" value="{{$isNew}}" name="button" onclick="return provera()">
                      Sacuvaj
                  </button>
              </div>
          </div>
          <div class="col-md-6">
              <input id="id" type="text" style="visibility:hidden" class="form-control" name="id" value="{{$user->id}}" >
          </div>

      </form>
    </div>

  </center>




  @endsection


  <script>

  function validateForm() {
    var x = document.getElementById('password').value;
    var y = document.getElementById('password-confirm').value;

      if (x != y) {
      alert("Pogresno ste uneli sifru. Molim pokusajte opet");
      return false;
    }

  }

  function provera()
  {
    if(document.getElementById('admin').checked)
    {
  return  confirm('Da li ste sigurni da zelite da ovaj korisnik bude Admin?');


}
  }


  function changeAdmin()
  {
      if(document.getElementById('admin').checked)
      {
        document.getElementById('form').action="{{route('postAddAdmin')}}";
        //return confirm('odradjeno');
      }

  }

  function changeUser()
  {
    if (document.getElementById('user').checked){
      document.getElementById('form').action="{{route('postAddUser')}}";
    //  return confirm('odradjeno2');
    }
  }






  </script>
