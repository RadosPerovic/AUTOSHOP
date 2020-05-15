

  <center class="jumbotron">
  <h1>Admin panel</h1>

</center>




<nav class="navbar navbar-expand-sm bg-primary navbar-dark" >
  <ul class="navbar-nav" style="color:black;">
    <li class="nav-item active" >
    <h3>  <a class="nav-link" href="{{route('admin')}}">Artikli</a> </h3>
    </li>
    <li class="nav-item" style="margin-left:20px;">
      <h3><a class="nav-link" href="{{route('getAddArticle')}}">Dodaj novi artikal</a></h3>
    </li>
    <li class="nav-item" style="margin-left:20px;">
      <h3><a class="nav-link" href="{{route('getUsers')}}">Korisnici</a></h3>
    </li>
    <li class="nav-item" style="margin-left:20px;">
      <h3><a class="nav-link" href="{{route('getAdmins')}}">Admini</a></h3>
    </li>
    <li class="nav-item" style="margin-left:20px;">
      <h3><a class="nav-link" href="{{route('getAddUserAdmin')}}">Dodaj novog Korisnika/Admina</a></h3>
    </li>
    <li class="nav-item" style="margin-left:20px;">
    </li>


    <li class="nav-item" style="margin-left:350px;">
      <h3><a class="nav-link" href="{{route('routeGET')}}">Pocetna strana</a></h3>
    </li>


  </ul>
</nav>
