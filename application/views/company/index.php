<div class="jumbotron">
  <h2 class="display-3"><?= $title ?></h2>
  <?php 
  if(isset($view) && $view == 1){

    ?>
<table id="dtcmpn" class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">ID</th>
      <th scope="col">Názov</th>
      <th scope="col">Adresa</th>
      <th scope="col">Zameranie</th>
      <th scope="col">Meno Z.O.</th>
      <th scope="col">Akcia</th>
    </tr>
  </thead>
  <tbody>
        <script type="text/javascript">
$(document).ready(function() {
    $('#dtcmpn').DataTable({
      "processing": true,
      "pageLength" : 5,
        "ajax": {
            url : "<?php echo site_url("Company/dtcompany") ?>",
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
  <input class="form-control form-control-sm" type="text" placeholder="Názov" id="addcompanyN" name="addcompanyN" required="required" pattern="[\s\S]*\S[\s\S]*" minlength="2" maxlength="60">
</div></td>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="text" placeholder="Adresa" id="addaddress" name="addaddress" required="required" pattern="[\s\S]*\S[\s\S]*" minlength="2" maxlength="45">
</div></td>
      <td><div class="form-group">
  <input class="form-control form-control-sm" type="text" placeholder="Zameranie" id="addfield" name="addfield" required="required" pattern="[\s\S]*\S[\s\S]*" minlength="2" maxlength="45">
</div></td>
      <td>    
        <div class="form-group">
      <select class="form-control-sm" id="txt_meno" name="txt_meno">
        <?php 
      foreach($id as $val){
        ?>
        <option value="<?php echo $val['idcrp']; ?>"><strong><?php echo $val['cele_meno']; ?> - ID: <?php echo $val['idcrp']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>
    </td>
      <td>
      <input class="btn btn-primary" type="submit"  name="pridajCompany" value="Pridať záznam">
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

<h2 class="display-3">Edituj firmu</h2>

<form method='post' action=''>
  <div class="form-group">
  <fieldset>
    <label class="control-label" for="readOnlyInput">ID firmy</label>
    <input class="form-control" id="readOnlyID" type="text" name="idcompany" placeholder="<?php echo $response[0]['idcompany']; ?>" readonly="">
  </fieldset>
</div>
<div class="form-group">
  <label class="col-form-label" for="txt_phonen"><strong><?php echo $response[0]['company_name']; ?></strong></label>
  <input type="text" class="form-control" placeholder="<?php echo $response[0]['company_name']; ?>" id="txt_companyN" name="txt_companyN">
</div>

<div class="form-group">
  <label class="col-form-label" for="txt_email"><strong><?php echo $response[0]['company_address']; ?></strong></label>
  <input type="text" class="form-control" placeholder="<?php echo $response[0]['company_address']; ?>" id="txt_companyA" name="txt_companyA">
</div>
<div class="form-group">
  <label class="col-form-label" for="txt_email"><strong><?php echo $response[0]['company_field']; ?></strong></label>
  <input type="text" class="form-control" placeholder="<?php echo $response[0]['company_field']; ?>" id="txt_companyF" name="txt_companyF">
</div>
      <div class="form-group">
      <label for="exampleSelect1"><strong><?php echo $response[0]['cele_meno']; ?></strong></label>
      <select class="form-control" id="txt_meno" name="txt_meno">
      <?php 
      foreach($id as $val){
        ?>
        <option><strong><?php echo $val['cele_meno']; ?></strong></option>
      <?php 
      }
      ?>
      </select>
    </div>

<input class="btn btn-success" type="submit"  name="aktualizovatCompany" value="Aktualizovať záznam">
<a class="btn btn-danger" href="<?php echo site_url('company?remove='.$response[0]['idcompany']); ?>" role="button">Vymazať záznam</a>

</form>
<?php 
}
?>
</div>
