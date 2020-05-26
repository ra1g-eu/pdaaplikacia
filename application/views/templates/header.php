<html>
	<head>
		<title>PDA APP</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
		<link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
    <script src="<?php echo base_url().'assets/js/jquery-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.js'?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
	</head>
	<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url(); ?>home">PDA Aplikácia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">Domov</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">O stránke</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>grafy">Grafy</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>students">Tab. študenti</a>
      </li>
           </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>crp">Tab. zodp. osôb</a>
      </li>
  		</li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>company">Tab. firiem</a>
      </li>
            </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>studprax">Tab. študentskej praxe</a>
      </li>
    </ul>
    <?php
$uname = $this->session->userdata('logged_in');
if(!$uname){
  ?>
      <form class="form-inline my-2 my-lg-0">
      <a class="nav-link btn btn-info" href="<?php echo base_url(); ?>adminsys/register">Registrácia</a>
      <a class="nav-link btn btn-secondary" href="<?php echo base_url(); ?>adminsys/login">Prihlásenie</a>
    </form>    
<?php 
} else {
  ?>
      <form class="form-inline my-2 my-lg-0">
      <a class="nav-link btn btn-info" href="<?php echo base_url(); ?>adminsys/profile">Profil</a>
      <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>adminsys/logout">Odhlásiť sa</a>
    </form>
  <?php
}
 
?>

  </div>
</nav>
<div class="container">
		
