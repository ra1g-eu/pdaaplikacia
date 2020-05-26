<div class="jumbotron">
  <h2 class="display-3">Edituj študenta</h2>

<form method="post">
  <div class="form-group">
  <fieldset>
    <label class="control-label" for="readOnlyInput"></label>
    <input class="form-control" id="readOnlyID" type="text" placeholder="<?php echo $row->idstudents; ?>" readonly="">
  </fieldset>
</div>

  <div class="form-group">
  <label class="col-form-label" for="inputMeno"><?php echo $row['student_fname']; ?></label>
  <input type="text" class="form-control" placeholder="Meno" name="studenf_fname">
</div>
<div class="form-group">
  <label class="col-form-label" for="inputPriezvisko"><?php echo $row['student_lname']; ?></label>
  <input type="text" class="form-control" placeholder="Priezvisko" id="inputPriezvisko">
</div>

<div class="form-group">
  <label class="col-form-label" for="inputEmail"><?php echo $row['student_mail']; ?></label>
  <input type="text" class="form-control" placeholder="Email" id="inputEmail">
</div>
<input type="submit" name="update" value="Aktualizovať záznam">

</form>

</div>