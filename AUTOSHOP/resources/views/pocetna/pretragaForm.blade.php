<div style="margin-top:20px;">
  <form class="" action="{{route('pretraga')}}" method="post">
  @csrf
    <fieldset>
      <legend>Pretraga</legend>

    <label for="tbPretraga">Unesite marku automobila koju zelite:</label>
    <input type="text" id="tbPretraga" name="tbPretraga" value="<?php echo $pretraga ?>" placeholder="primer 'Audi'"  onkeypress="doSomething(this.value)" onchange="doSomething(this.value)">
    <button type="submit" name="button" value="submit">Potvrdi</button>
    <button type="submit" name="button" value="reset">Resetuj</button>
    <label name="broj" id="broj">  </label>

    </fieldset>

  </form>
</div>
