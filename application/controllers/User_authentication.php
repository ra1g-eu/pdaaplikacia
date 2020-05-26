<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



Class User_authentication extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('Login_database');
}

// Show login page
public function index() {
$this->load->view('templates/header');
$this->load->view('adminsys/login');
$this->load->view('templates/footer');
}

// Show registration page
public function user_registration_show() {
$this->load->view('templates/header');
$this->load->view('adminsys/register');
$this->load->view('templates/footer');
}

// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('templates/header');
$this->load->view('adminsys/register');
$this->load->view('templates/footer');
} else {
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password')
);
$result = $this->Login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Zaregistrovaný úspešne!';
$this->load->view('templates/header');
$this->load->view('adminsys/login', $data);
$this->load->view('templates/footer');
} else {
$data['message_display'] = 'Prezývka už existuje!';
$this->load->view('templates/header');
$this->load->view('adminsys/register', $data);
$this->load->view('templates/footer');
}
}
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('templates/header');
$this->load->view('adminsys/profile');
$this->load->view('templates/footer');
}else{
$this->load->view('templates/header');
$this->load->view('adminsys/login');
$this->load->view('templates/footer');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->Login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->Login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('templates/header');
$this->load->view('adminsys/profile');
$this->load->view('templates/footer');
}
} else {
$data = array(
'error_message' => 'Nesprávne heslo alebo prezývka'
);
$this->load->view('templates/header');
$this->load->view('adminsys/login', $data);
$this->load->view('templates/footer');
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Úspešne odhlásený';
$this->load->view('templates/header');
$this->load->view('adminsys/login', $data);
$this->load->view('templates/footer');
}

}

?>