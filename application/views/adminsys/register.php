<div class="jumbotron">
  <h1 class="display-3">Registrácia do systému</h1>
  <?php
if (isset($this->session->userdata['logged_in'])) {
redirect('adminsys/profile');
}
?>
<div id="main">
<div id="login">
<?php
echo "<div class='error_msg'>";
if(validation_errors()){
echo "<div class='alert alert-dismissible alert-danger'>";
echo "<h4 class='alert-heading'>Pozor!</h4>";
echo "<p class='mb-0'>"; echo validation_errors(); echo "</p>";
echo "</div>";
}
echo "</div>";
echo form_open('adminsys/register');
?>

<div class="form-group">
<label>Prezývka</label>
<input type="text" class="form-control" name="username" id="name" placeholder="Vlož prezývku" required="required" pattern="[\s\S]*\S[\s\S]*" minlength="3" maxlength="16"/>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email_value" id="name" placeholder="Vlož email" required="required" pattern="[\s\S]*\S[\s\S]*" maxlength="100"/>
</div>
<div class="form-group">
<label>Heslo</label>
<input type="text" class="form-control" name="password" id="name" placeholder="Vlož heslo" required="required" pattern="[\s\S]*\S[\s\S]*" maxlength="256"/>
</div>

<?php
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
?>
<form>
<div class="form-group">
<div class="form-group">
<input type="submit" class="btn btn-success" value=" Registrovať sa " name="submit"/>

<?php
echo form_close();
?>
<a href="<?php echo base_url() ?>adminsys/login" class="btn btn-info">Na prihlásenie klikni sem</a>
</div>
</div>
</div>
</form>
</div>
</div>
