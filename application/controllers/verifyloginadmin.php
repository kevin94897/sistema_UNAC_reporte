<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLoginadmin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
   $this->load->helper('security');
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
    $this->form_validation->set_message('required','Ingrese el %s');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('administrador/loginadmin');
   }
   else
   {
     //Go to private area
     redirect('home/opcionesAdmin', 'refresh');
   }
 }


function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $usuario = $this->input->post('usuario');
   //query the database
   $result = $this->user->loginAdmin($usuario, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id_admin' => $row->id_admin,
         'usuario' => $row->admin
       );
       $this->session->set_userdata('user', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Ingrese el password');
     return false;
   }
 }

}
?>