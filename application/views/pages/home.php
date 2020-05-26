<?php
$user_id= $this->session->userdata('iduser');
$uname = $this->session->userdata('user_name');
if(!$user_id){
 
//redirect('adminsys/login');
}
 
?>
<div class="jumbotron">
  <h2 class="display-3"><?= $title ?></h2>
  <p class="lead">Študenti a ich prax</p>
  <hr class="my-4">
  <p>Projekt na predmet Programovanie databázových aplikácií, UKF.</p>
  

  <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Vitaj na stránke <?php echo $uname ?>!</h4>
  <p class="mb-0">Stránke je stále vo vývoji. Všetok obsah sa môže zmeniť.</p>
</div>

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>home" role="button">Rozumiem</a>
  </p>
</div>