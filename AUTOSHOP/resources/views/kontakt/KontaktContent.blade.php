
<div class="row" style="margin-top:20px;"> <!-- podela prikaza -->
<div class="col-md-6">

      <h2 class="page-header">
        <strong>Kontakt</strong>
      </h2>
      @if (session('alert'))
          <div class="alert alert-success">
              {{ session('alert') }}
          </div>
      @endif
      <br>

      <form method="post" action="{{route('postKontakt')}}">
        @csrf<!-- pocetak forme -->
        <div class="form-group">
          <label for="inputName">Vaše ime i prezime</label>
          <input type="text" class="form-control" id="inputName" placeholder="Upišite Vaše ime i prezime">
        </div>
        <div class="form-group">
          <label for="inputEmail">Vaš e-mail</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="Upišite Vaš e-mail">
        </div>
        <div class="form-group">
          <label for="inputTel">Vaš telefonski broj</label>
          <input type="tel" class="form-control" id="inputTel" placeholder="Upišite Vaš telefonski broj">
        </div>
        <div class="form-group">
          <label for="inputSubject">Naslov poruke</label>
          <input type="text" class="form-control" id="inputSubject" placeholder="Naslov Vaše poruke">
        </div>
        <div class="form-group">
          <label for="inputText">Tekst poruke</label>
          <textarea class="form-control" rows="5" id="inputText"></textarea>
        </div>
        <button type="submit" class="btn btn-danger btn-lg btn-block">Pošaljite</button>
      </form> <!-- kraj forme -->
    </div>

    <div class="col-md-6">
      <h2 class="page-header">
        <strong>Gde se nalazimo</strong>
      </h2>
      <br>
      <p><i class="fas fa-map-marker" aria-hidden="true"></i> Dr Arcibalda Rajsa 5, Smederevo 11300 </p>
      <p><i class="fas fa-phone" aria-hidden="true"></i> +381 65 383 2015</p>
      <p><i class="fas fa-envelope" aria-hidden="true"></i> autoshop@gmail.com</p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2838.4254716709283!2d20.909726215401292!3d44.649658179099816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475093fa86d3058b%3A0xb848ecfe2a867f94!2z0JTRgCDQkNGA0YfQuNCx0LDQu9C00LAg0KDQsNGY0YHQsCwg0KHQvNC10LTQtdGA0LXQstC-!5e0!3m2!1ssr!2srs!4v1581958874979!5m2!1ssr!2srs" width="539" height="435" frameborder="0" style="border:0;" allowfullscreen=""></iframe>    </div>

  </div> <!-- kraj podele prikaza -->
