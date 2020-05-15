<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:0px;">
  <a class="navbar-brand" href="{{action("PocetnaController@index")}}"><span class="fa fa-home" aria-hidden="true"/> Pocetna strana</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{route('onama')}}">Galerija</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('cart')}}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Korpa
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route('kontakt')}}">Kontakt</a>
      </li>
    </ul>
      <?php if(is_null(Auth::user())) { ?>
      <a href="{{route("home")}}">Registruj se</a>
    <?php } else { ?>
      <a style="color:white;">Nalog:<a style="margin-left:5px; margin-right:10px;" href="{{route("home")}}"> {{ Auth::user()->name }}</a></a>
      <a class="nav-link" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                       Izloguj se
                                   </a>

                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                   </form>
    <?php } ?>



  </div>
</nav>
