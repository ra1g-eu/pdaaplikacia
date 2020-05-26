<div class="jumbotron">
  <h1 class="display-3">Prihlásenie do systému</h1>

<?php
if (isset($this->session->userdata['logged_in'])) {

redirect('home');
}
?>

<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo "<div class='alert alert-dismissible alert-success'>";
echo "<h4 class='alert-heading'>Info!</h4>";
echo "<p class='mb-0'>"; echo $message_display; echo "</p>";
echo "</div>";
echo "</div>";
}
?>
<div id="main">
<div id="login">
<?php echo form_open('adminsys/profile'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Pozor!</h4>
  <p class="mb-0"> <?php echo $error_message; ?></p>
</div>
<?php
}
if(validation_errors()){
echo "<div class='alert alert-dismissible alert-danger'>";
echo "<h4 class='alert-heading'>Pozor!</h4>";
echo "<p class='mb-0'>"; echo validation_errors(); echo "</p>";
echo "</div>";
}
echo "</div>";

?>
<form>
<div class="form-group">
<label>Prezývka</label>
<input type="text" class="form-control" name="username" id="name" placeholder="Vlož prezývku" required="required" pattern="[\s\S]*\S[\s\S]*"/>
</div>
<div class="form-group">
<label>Heslo</label>
<input type="password" class="form-control" name="password" id="password" placeholder="Vlož heslo" required="required" pattern="[\s\S]*\S[\s\S]*"/>
</div>
<div class="form-group">
<input type="submit" class="btn btn-success" value=" Prihlásiť sa " name="submit"/>
<a href="<?php echo base_url() ?>adminsys/register" class="btn btn-info">Na zaregistrovanie klikni sem</a>
<?php echo form_close(); ?>
</div>
</form>
</div>
</div>
</div>
