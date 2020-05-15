<div class="col mb-4">
  <form action="{{route('addCart')}}" method="post">
    @csrf
 <div class="card">
   <img  src="images/{{$artikal->marka}}.jpg" class="card-img-top" alt="..." style="height: 100px; width: auto;">
      <div class="card-body">
         <h5 class="card-title">{{$artikal->marka}}</h5>
         <h3 class="card-title">{{$artikal->naziv}} </h3>
         <p class="card-text" style="color:red;">Cena:{{$artikal->cena}}</p>
         <p class="card-text">{{$artikal->opis}}</p>
         Kolicina: <input type="number" id="{{$artikal->id}}" name="{{$artikal->id}}" value="1" min="1" max="99">
       <input type="text" id="id" name="id" value="{{$artikal->id}}" style="visibility:hidden;">
      </div>
   <div class="text-center" style="margin-bottom:10px;">
  <button type="submit" class="btn btn-danger" name="add" id="add" style="width:150px; align:center;">Dodaj u korpu</button>
</div>
 </div>
</form>
</div>
