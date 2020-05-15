<div class="row" style="margin-top:20px; margin-bottom:500px;"> <!-- podela prikaza -->
<div class="col-md-6">

      <h2 class="page-header">
        <strong>Sign In</strong>
      </h2>
      <br>

      <form method="post" action="{{action ("RegistracijaController@postSignin")}}">
        @csrf <!-- pocetak forme -->
        <div class="form-group">
          <label for="inputEmail">Vaš e-mail</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Upišite Vaš e-mail">
        </div>

        <div class="form-group">
          <label for="inputSubject">Vasa lozinka</label>
          <input type="text" class="form-control" name="password" id="password" placeholder="lozinka">
        </div>

        <button type="submit" class="btn btn-danger btn-lg btn-block">Prijavi se(Sign up)</button>
      </form> <!-- kraj forme -->
    </div>

  </div>
