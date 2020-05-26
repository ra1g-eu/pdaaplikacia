<div class="jumbotron">
  <h2 class="display-3"><?= $title ?></h2>
  <?php 
  if(isset($view) && $view == 1){

    ?>
<table id="dtstdprx" class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">ID práce</th>
      <th scope="col">Meno študenta</th>
      <th scope="col">Názov firmy</th>
      <th scope="col">Názov práce</th>
      <th scope="col">Čas začatia</th>
      <th scope="col">Čas ukončenia</th>
      <th scope="col">Akcia</th>
    </tr>
  </thead>
  <tbody>
    <script type="text/javascript">
$(document).ready(function() {
    $('#dtstdprx').DataTable({
      "processing": true,
      "pageLength" : 5,
        "ajax": {
            url : "<?php echo site_url("Studprax/dtstudprax") ?>",
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
      <td>    
        <div class="form-group">
      <select class="form-control-sm" id="txt_meno" name="txt_meno">
        <?php 
      foreach($idst as $val){
        ?>
        <option><strong><?php echo $val['cele_meno']; ?> - ID: <?php echo $val['idstudents']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>
    </td>
          <td>    
        <div class="form-group">
      <select class="form-control-sm" id="txt_menocompany" name="txt_menocompany">
        <?php 
      foreach($idco as $val){
        ?>
        <option><strong><?php echo $val['company_name']; ?> - ID: <?php echo $val['idcompany']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>
    </td>
          <td>    
        <div class="form-group">
      <select class="form-control-sm" id="txt_nazovprace" name="txt_nazovprace">
        <?php 
      foreach($idnp as $val){
        ?>
        <option><strong><?php echo $val['nazov_prace']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>
    </td>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="date" placeholder="Čas začatia" id="addfield" name="addfield" required="required">
</div></td>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="date" placeholder="Čas ukončenia" id="addfield" name="addfield">
</div></td>

      <td>
      <input class="btn btn-primary" type="submit"  name="pridajStudprax" value="Pridať záznam">
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
  ?>

<h2 class="display-3">Edituj študentskú prax</h2>

<form method='post' action=''>
  <div class="form-group">
  <fieldset>
    <label class="control-label" for="readOnlyInput">ID praxe</label>
    <input class="form-control" id="readOnlyID" type="text" name="idstudpr" placeholder="<?php echo $response[0]['idstudentska_prax']; ?>" readonly="">
  </fieldset>
</div>
      <div class="form-group">
      <label for="exampleSelect1"><strong><?php echo $response[0]['cele_meno']; ?></strong></label>
      <select class="form-control" id="txt_studname" name="txt_studname">
      <?php 
      foreach($idst as $val){
        ?>
        <option><strong><?php echo $val['cele_meno']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>

      <div class="form-group">
      <label for="exampleSelect1"><strong><?php echo $response[0]['company_name']; ?></strong></label>
      <select class="form-control" id="txt_companyN" name="txt_companyN">
      <?php 
      foreach($idco as $val){
        ?>
        <option><strong><?php echo $val['company_name']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>
      <div class="form-group">
      <label for="exampleSelect1"><strong><?php echo $response[0]['nazovprace']; ?></strong></label>
      <select class="form-control" id="txt_nazovprace" name="txt_nazovprace">
      <?php 
      foreach($idnp as $val){
        ?>
        <option><strong><?php echo $val['nazov_prace']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>
<div class="form-group">
  <label class="col-form-label" for="txt_email"><strong><?php echo $response[0]['time_started']; ?></strong></label>
  <input type="date" class="form-control" placeholder="<?php echo $response[0]['time_started']; ?>" id="txt_timeS" name="txt_timeS">
</div>
<div class="form-group">
  <label class="col-form-label" for="txt_email"><strong><?php echo $response[0]['time_ended']; ?></strong></label>
  <input type="date" class="form-control" placeholder="<?php echo $response[0]['time_ended']; ?>" id="txt_timeE" name="txt_timeE">
</div>
<input class="btn btn-success" type="submit"  name="aktualizovatStudprax" value="Aktualizovať záznam">
<a class="btn btn-danger" href="<?php echo site_url('studprax?remove='.$response[0]['idstudentska_prax']); ?>" role="button">Vymazať záznam</a>

</form>
<?php 
}
?>
</div>
