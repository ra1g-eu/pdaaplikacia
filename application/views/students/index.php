<div class="jumbotron">
  <h2 class="display-3"><?= $title ?></h2>

  <?php 
  if(isset($view) && $view == 1){

    ?>

<table id="sttable" class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">ID</th>
      <th scope="col">Meno</th>
      <th scope="col">Priezvisko</th>
      <th scope="col">Email</th>
      <th scope="col">Akcia</th>
    </tr>
  </thead>
  <tbody>
<script type="text/javascript">
$(document).ready(function() {
    $('#sttable').DataTable({
      "processing": true,
      "pageLength" : 5,
        "ajax": {
            url : "<?php echo site_url("Students/dtstudents") ?>",
            type : 'GET'
        },

    });
});
</script>

 </tbody>
</table>
    <?php
$uname = $this->session->userdata('logged_in');
if(!$uname){
  ?>
  
<?php 
} else {
  ?>
<div class="jumbotron">
  <h4>Pridať záznam</h4>
  <table id="addtable" class="table table-hover">
  <thead>
    <tr class="table-info">
      <td>ID</td>
      <form method='post' action=''>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="text" placeholder="Krstné meno" id="addfname" name="addfname" required="required" pattern="[\s\S]*\S[\s\S]*" minlength="2" maxlength="25">
</div></td>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="text" placeholder="Priezvisko" id="addlname" name="addlname" required="required" pattern="[\s\S]*\S[\s\S]*" minlength="2" maxlength="25">
</div></td>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="email" placeholder="Email" id="addmail" name="addmail" required="required" pattern="[\s\S]*\S[\s\S]*" maxlength="90">
</div></td>
      <td>
      <input class="btn btn-success" type="submit"  name="pridajStudent" value="Pridať záznam">
    </td></form>
    </tr>
  </thead>
</table>
  </div>
  <?php
} 
?>

<?php
}

if(isset($view) && $view == 2){
  $uname = $this->session->userdata('logged_in');
if(!$uname){
  ?>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Pozor!</h4>
  <p class="mb-0">Nie si prihlásený! Prihlás sa alebo sa zaregistruj!</p>
</div>
  <?php
  } else {
  ?>

<h2 class="display-3">Edituj študenta</h2>

<form method='post' action=''>
  <div class="form-group">
  <fieldset>
    <label class="control-label" for="readOnlyInput">ID Študenta</label>
    <input class="form-control" id="readOnlyID" type="text" name="idstudents" placeholder="<?php echo $response[0]['idstudents']; ?>" readonly="">
  </fieldset>
</div>

  <div class="form-group">
  <label class="col-form-label" for="txt_fname"><strong><?php echo $response[0]['student_fname']; ?></strong></label>
  <input type="text" class="form-control" placeholder="<?php echo $response[0]['student_fname']; ?>" name="txt_fname" id="txt_fname" >
</div>
<div class="form-group">
  <label class="col-form-label" for="txt_lname"><strong><?php echo $response[0]['student_lname']; ?></strong></label>
  <input type="text" class="form-control" placeholder="<?php echo $response[0]['student_lname']; ?>" id="txt_lname" name="txt_lname" >
</div>

<div class="form-group">
  <label class="col-form-label" for="txt_email"><strong><?php echo $response[0]['student_mail']; ?></strong></label>
  <input type="text" class="form-control" placeholder="<?php echo $response[0]['student_mail']; ?>" id="txt_email" name="txt_email">
</div>
<input class="btn btn-success" type="submit"  name="aktualizovatStudenta" value="Aktualizovať záznam">
<a class="btn btn-danger" href="<?php echo site_url('students?remove='.$response[0]['idstudents']); ?>" role="button">Vymazať záznam</a>

</form>
<?php 
}
}
?>
</div>
