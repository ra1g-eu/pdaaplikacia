<div class="jumbotron">
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
redirect('adminsys/login');
}
?>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Vitaj v profile!</h4>
  <p class="mb-0"><span class="badge badge-primary">Tvoja prezývka: <?php echo $username; ?></span></p>
  <p class="mb-0"><span class="badge badge-primary">Tvoj email: <?php echo $email; ?></span></p>
</div>
<div id="profile">

<a href="<?php echo base_url() ?>adminsys/logout" class="btn btn-danger" id="logout">Odhlásiť sa</a>
</div>
</div>