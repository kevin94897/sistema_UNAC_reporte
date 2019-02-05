<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Envio_email extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('user');	
		$this->load->library('email');
	}
	function index()
	{
	 	$data['title'] = 'Formulario de registro';
		$data['head'] = 'Regístrate desde aquí';
		$this->load->view('administrador/registro', $data);
    }

    function usuario_correcto()
	{
		$this->load->view('administrador/correcto');
    }

	function nuevo_usuario()
	{
		if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
		{
			//SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
			$this->form_validation->set_rules('nom','Nombre','required|trim|xss_clean');
			$this->form_validation->set_rules('correo','Correo','required|valid_email|trim|xss_clean|is_unique[usuarios.correo]');
			$this->form_validation->set_rules('nick','Usuario','required|trim|xss_clean');
			$this->form_validation->set_rules('pass','Password','required|trim|xss_clean|md5');
			
			//SI HAY ALGÚNA REGLA DE LAS ANTERIORES QUE NO SE CUMPLE MOSTRAMOS EL MENSAJE
			//EL COMODÍN %s SUSTITUYE LOS NOMBRES QUE LE HEMOS DADO ANTERIORMENTE, EJEMPLO, 
			//SI EL NOMBRE ESTÁ VACÍO NOS DIRÍA, EL NOMBRE ES REQUERIDO, EL COMODÍN %s 
			//SERÁ SUSTITUIDO POR EL NOMBRE DEL CAMPO
			$this->form_validation->set_message('is_unique', 'El %s ya está siendo usado.');
			$this->form_validation->set_message('required', 'El %s es requerido');
	        $this->form_validation->set_message('valid_email', 'El %s no es válido');
			
			//SI ALGO NO HA IDO BIEN NOS DEVOLVERÁ AL INDEX MOSTRANDO LOS ERRORES
			if($this->form_validation->run()==FALSE)
			{
				$this->index();
			}else{
			//EN CASO CONTRARIO PROCESAMOS LOS DATOS
				$nombre = $this->input->post('nom');
				$correo = $this->input->post('correo');
				$nick = $this->input->post('nick');
				$password = $this->input->post('pass');
				$random = $this->input->post('randomfield');
                        //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
				$insert = $this->user->new_user($nombre,$correo,$nick,$password);
				//si el modelo nos responde afirmando que todo ha ido bien, envíamos un correo
				//al usuario y lo redirigimos al index, en verdad deberíamos redirigirlo al home de
				//nuestra web para que puediera iniciar sesión
				$this->email->from('cciesam@gmail.com', 'Administrador');
				$this->email->to($correo);
				//super importante, para poder envíar html en nuestros correos debemos ir a la carpeta 
				//system/libraries/Email.php y en la línea 42 modificar el valor, en vez de text debemos poner html
				$this->email->subject('Bienvenido a CCIESAM');
				$this->email->message("Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n ".base_url()."envio_email/verificacion/".$password."/".$random."\n"."\n\nThanks\nAdmin Team");
				$this->email->message('
				        <html>
				          <head>
				            <title>CCIESAM</title>
				          </head>
				          <body>
				            <h2>'.ucfirst($nombre).' gracias por registrarte en el Sistema Bibliotecario CCIESAM</h2>
				            <h2>Tu nombre de usuario es: '.$nick.'.</h2>
				            <p>Este nuevo sistema que estamos implementando le ayudará a una búsqueda rapida y eficiente de los libros que actualmente cuenta la Biblioteca.</p>
				            <h3>Puede verificar su cuenta ingresando al siguiente enlace: '.base_url().'envio_email/verificacion/'.$password.'</h3>
				            <h4>Haga 
				            <a href='.base_url().'>click aquí</a>
				            para redirigirlo al login de la página.</h4>
				            <br>
				            <p>Gracias.</p>
				            <p>Administrador del Sistema Bibliotecario CCIESAM.</p>
				          </body>
				        </html>
				'); 
				$this->email->set_mailtype("html");
				$this->email->send();

				$this->session->set_flashdata('creado','El usuario fue creado correctamente');
        		redirect('envio_email/usuario_correcto', 'refresh');
			}
		}
	}

	function verificacion(){
		$password = $this->uri->segment(3);
		$this->user->activarUsuario($password);

		$this->session->set_flashdata('verificado','Usted ha verificado su cuenta correctamente');

		redirect('envio_email/usuario_correcto', 'refresh');
	}


}
?>