<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller 
{
  
 function __construct()
 {
   parent::__construct();
   $this->load->model('modeldatos');
   $this->load->library("pagination");
 }
 
 function index()
 {
   if($this->session->userdata('user'))
   {
    $session_data = $this->session->userdata('user');
    $data['usuario'] = $session_data['usuario'];
    $data['contenido'] = 'front/index';
    $this->load->view('includes/template',$data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

function admin(){
  $this->load->view('administrador/loginadmin');
}

 function logout(){

    $this->session->set_userdata('user','');

    redirect('','refresh');

  }

public function principal(){
  $session_data = $this->session->userdata('user');
  $data['usuario'] = $session_data['usuario'];
  $data['contenido'] = 'front/index';
  $this->load->view('includes/template',$data);
}

public function vista(){
  $session_data = $this->session->userdata('user');
  $data['usuario'] = $session_data['usuario'];
  $data['contenido'] = 'front/catalogodetalle';
  $this->load->view('includes/template',$data);
  redirect(current_url(), "refresh"); 
}

public function reservados(){
  $session_data = $this->session->userdata('user');
  $data['usuario'] = $session_data['usuario'];
  $data['contenido'] = 'front/reservados';
  $this->load->view('includes/template',$data);
}

public function detallecatalogo(){
  $id = $this->uri->segment(3);
  $session_data = $this->session->userdata('user');
  $data['libros'] = $this->modeldatos->getdetalleLibro($id);
  $data['usuario'] = $session_data['usuario'];
  $data['contenido'] = 'front/catalogodetalle';
  $this->load->view('includes/template',$data);
}

public function catalogo()
  {
    $session_data = $this->session->userdata('user');
    $config = array();
    $config["base_url"] = base_url() . "index.php/home/catalogo";
    $config["total_rows"] = $this->modeldatos->numeroLibros();
    $config["per_page"] = 6;
    $config["uri_segment"] = 3;
    $config["num_links"] = 10;

    $config['first_link'] = '&laquo; Primero';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Último &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Siguiente &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&larr; Anterior';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->modeldatos->limiteLibros($config["per_page"], $page);
    $data["cursos"] = $this->modeldatos->getcomboCursos();
    $data["links"] = $this->pagination->create_links();
    $data['usuario'] = $session_data['usuario'];
    $data['contenido'] = 'front/catalogo';
    $this->load->view('includes/template',$data);
  }

public function buscarporCurso()
  {
    $session_data = $this->session->userdata('user');
    $query = $this->uri->segment(3);

    $config["base_url"] = base_url() . "index.php/home/buscarporcurso/".$query;
    $config["total_rows"] = $this->modeldatos->numerolibrosporCurso($query);
    $config["per_page"] = 6;
    $config["uri_segment"] = 4;
    $config["num_links"] = 5;

    $config['first_link'] = '&laquo; Primero';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Último &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Siguiente &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&larr; Anterior';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["resultados"] = $this->modeldatos->limitelibrosporCurso($query,$config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();
    $data['cursos'] = $this->modeldatos->getlibroporCurso2($query);
    $data['usuario'] = $session_data['usuario'];
    $data["combo"] = $this->modeldatos->getcomboCursos();
    $data['contenido'] = 'front/buscarporcurso';
    $this->load->view('includes/template',$data);
  }


public function porTitulo(){
  $query = $this->input->get('query',TRUE);
  redirect('home/filtroTitulo/'.$query, 'refresh');
}

public function porAutor(){
  $query = $this->input->get('query',TRUE);
  redirect('home/filtroAutor/'.$query, 'refresh');
}

public function porEditorial(){
  $query = $this->input->get('query',TRUE);
  redirect('home/filtroEditorial/'.$query, 'refresh');
}

public function filtroTitulo()
  {
    $session_data = $this->session->userdata('user');
    $data = array();
    $query = $this->uri->segment(3);

    $config["base_url"] = base_url() . "index.php/home/filtroTitulo/".$query;
    $config["total_rows"] = $this->modeldatos->numerolibrosporTitulo($query);
    $config["per_page"] = 6;
    $config["uri_segment"] = 4;
    $config["num_links"] = 5;
    $config['first_link'] = '&laquo; Primero';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Último &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Siguiente &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&larr; Anterior';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["resultados"] = $this->modeldatos->limiteLibrosTitulo($query,$config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['usuario'] = $session_data['usuario'];
    $data['blibros'] = $this->modeldatos->getLibro();
    $data["combo"] = $this->modeldatos->getcomboCursos();
    $data['contenido'] = 'front/busqueda';
    $this->load->view('includes/template',$data);
  }

public function filtroAutor()
  {
    $session_data = $this->session->userdata('user');
    $data = array();
    $query = $this->uri->segment(3);

    $config["base_url"] = base_url() . "index.php/home/filtroAutor/".$query;
    $config["total_rows"] = $this->modeldatos->numerolibrosporAutor($query);
    $config["per_page"] = 6;
    $config["uri_segment"] = 4;
    $config["num_links"] = 5;
    $config['first_link'] = '&laquo; Primero';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Último &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Siguiente &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&larr; Anterior';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["resultados"] = $this->modeldatos->limiteAutor($query,$config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['usuario'] = $session_data['usuario'];
    $data['blibros'] = $this->modeldatos->getLibro();
    $data["combo"] = $this->modeldatos->getcomboCursos();
    $data['contenido'] = 'front/busqueda';
    $this->load->view('includes/template',$data);
  }

public function filtroEditorial()
  {
    $session_data = $this->session->userdata('user');
    $data = array();
    $query = $this->uri->segment(3);

    $config["base_url"] = base_url() . "index.php/home/filtroEditorial/".$query;
    $config["total_rows"] = $this->modeldatos->numerolibrosporEditorial($query);
    $config["per_page"] = 6;
    $config["uri_segment"] = 4;
    $config["num_links"] = 5;
    $config['first_link'] = '&laquo; Primero';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Último &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Siguiente &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&larr; Anterior';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["resultados"] = $this->modeldatos->limiteLibrosEditorial($query,$config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();
    $data['usuario'] = $session_data['usuario'];
    $data['blibros'] = $this->modeldatos->getLibro();
    $data["combo"] = $this->modeldatos->getcomboCursos();
    $data['contenido'] = 'front/busqueda';
    $this->load->view('includes/template',$data);
  }

/*
public function porTitulo1()
  {
    $session_data = $this->session->userdata('logged_in');
    $data = array();

    $query = $this->input->get('query',TRUE);

    if($query){
      $result = $this->modeldatos->buscarporBiblioteca1(trim($query));
      if ($result != FALSE){
        $data = array('result' => $result);
      }else{
        $data = array('result' => '');
      }
    }else{
        $data = array('result' => '');
      }
    $data['usuario'] = $session_data['usuario'];
    $data['blibros'] = $this->modeldatos->getLibro();
    $data["combo"] = $this->modeldatos->getcomboCursos();
    $data['contenido'] = 'front/busqueda';
    $this->load->view('includes/template',$data);
  }

public function porTitulo2()
  {
    $session_data = $this->session->userdata('logged_in');
    $data = array();

    $query = $this->input->get('query',TRUE);

    if($query){
      $result = $this->modeldatos->buscarporBiblioteca2(trim($query));
      if ($result != FALSE){
        $data = array('result' => $result);
      }else{
        $data = array('result' => '');
      }
    }else{
        $data = array('result' => '');
      }
    $data['usuario'] = $session_data['usuario'];
    $data['blibros'] = $this->modeldatos->getLibro();
    $data['contenido'] = 'front/busqueda';
    $this->load->view('includes/template',$data);
  }

*/

function agregarLibro()
    {
      $this->session->unset_userdata('cart_contents');
      $id = $this->input->post('cod_libro');
      $libro = $this->modeldatos->porCodLibro($id);
      $cantidad = 1;
      $existe = false;

      foreach ($this->cart->contents() as $reservado) {
          if ($reservado['cod_libro'] == $id) {
              $existe= true;
              $cantidad = 1 + $reservado['qty'];
              break;
          }
      }

        $data = array(
          'id'      => $id,
          'price'   => 1,
          'name'    => $id,
          
          'cod_libro' => $id,
          'titulo'  => $libro->titulo,
          'qty'     => $cantidad
        );

        $this->cart->insert($data);
        $uri = $this->input->post('uri');
        $this->session->set_flashdata('agregado', 'El libro fue agregado a su lista de reservas.');
        redirect('home/detallecatalogo/'.$uri, 'refresh');
    }
    
function eliminarLibro($rowid) 
    {
        $libro = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->cart->update($libro);
        $this->session->set_flashdata('productoEliminado', 'El libro fue eliminado de su lista de reservas.');
        redirect('home/reservados', 'refresh');
    }
    
function eliminarReservas() 
    {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'La lista de reservas fue eliminado correctamente');
        redirect('home/reservados', 'refresh');
    }



/*VISTA ADMINISTRADOR*/


function opcionesAdmin(){    
    $session_data = $this->session->userdata('user');
    $data['usuario'] = $session_data['usuario'];
    $this->load->view('administrador/opcionAdmin', $data);
    $this->load->view('administrador/footeradmin');
  }


public function verLibroAdmin(){    
    $session_data = $this->session->userdata('user');
    $data['libros'] = $this->modeldatos->getLibroAdmin();
    $data['usuario'] = $session_data['usuario'];
    $this->load->view('administrador/headeradmin', $data);
    $this->load->view('administrador/administrador', $data);
    $this->load->view('administrador/footeradmin');
  }

public function agregarLibroAdmin() {
    $session_data = $this->session->userdata('user');
    $data['estados'] = $this->modeldatos->getEstadoLibroAdmin();
    $data['caract'] = $this->modeldatos->getCaractLibroAdmin();
    $data['curso'] = $this->modeldatos->getCursoLibroAdmin();
    $data['usuario'] = $session_data['usuario'];
    $this->load->view('administrador/headeradmin', $data);
    $this->load->view('administrador/agregar', $data);
    $this->load->view('administrador/footeradmin');
  }

public function guardarLibroAdmin() {
    $data = array(
      'cod_libro' => $this->input->post('codigo',TRUE),
      'titulo'    => $this->input->post('titulo',TRUE),
      'autor'     => $this->input->post('autor', TRUE),
      'editorial' => $this->input->post('editorial', TRUE),
      'anio'      => $this->input->post('anio', TRUE)
    );

    $data1 = array(
      'cod_libro' => $this->input->post('codigo',TRUE),
      'cod_curso' => $this->input->post('curso', TRUE),
      'cod_caract'=> $this->input->post('caracteristica', TRUE),
      'cod_estado'=> $this->input->post('estado', TRUE),
      'ciudad'    => $this->input->post('ciudad', TRUE),
      'tema'      => $this->input->post('tema', TRUE),
      'paginas'   => $this->input->post('paginas', TRUE),
      'obs'       => $this->input->post('obs', TRUE)
    );

    $this->session->set_flashdata('agregado', 'El libro fue agregado correctamente.');
    $this->modeldatos->guardarLibro($data);
    $this->modeldatos->guardarLibroDetalle($data1);
    redirect('home/verLibroAdmin');
  }

public function eliminarLibroAdmin(){ 
    $id = $this->uri->segment(3);
    if ($id){
      $this->session->set_flashdata('eliminado', 'El libro fue eliminado correctamente.');
      $this->modeldatos->eliminarLibro($id);
      $this->modeldatos->eliminarDetalleLibro($id);
      redirect('home/verLibroAdmin');
    }
}

public function editarLibroAdmin(){ 
    $id = $this->uri->segment(3);
    $session_data = $this->session->userdata('user');
    $enlace= $this->modeldatos->editarLibro($id);
    $enlacedetalle= $this->modeldatos->editarLibroDetalle($id);
    if ($enlace != FALSE){
      foreach ($enlace->result() as $row) {
        $codigo = $row->cod_libro;
        $titulo = $row->titulo;
        $autor = $row->autor;
        $editorial = $row->editorial;
        $anio = $row->anio;
      }

      foreach ($enlacedetalle->result() as $row) {
        $cod_curso = $row->cod_curso;
        $codigo = $row->cod_libro;
        $cod_estado = $row->cod_estado;
        $cod_caract = $row->cod_caract;
        $paginas = $row->paginas;
        $tema = $row->tema;
        $obs = $row->obs;
        $ciudad = $row->ciudad;
      }


      $data = array(
        'cod_curso'=> $cod_curso,
        'codigo' => $codigo,
        'titulo' => $titulo,
        'autor'  => $autor,
        'editorial' => $editorial,
        'anio' => $anio,
        'cod_estado' => $cod_estado,
        'cod_caract' => $cod_caract,
        'paginas' => $paginas,
        'ciudad' => $ciudad,
        'obs' => $obs,
        'tema' => $tema
        );

    }else{
      return FALSE;
    }
    $data['estados'] = $this->modeldatos->getEstadoLibroAdmin();
    $data['caract'] = $this->modeldatos->getCaractLibroAdmin();
    $data['curso'] = $this->modeldatos->getCursoLibroAdmin();
    $data['usuario'] = $session_data['usuario'];
    $this->load->view('administrador/headeradmin', $data);
    $this->load->view('administrador/editar', $data);
    $this->load->view('administrador/footeradmin');
    }

public function editarLibro(){
  $id = $this->uri->segment(3);
  $data = array(
    'cod_libro' => $this->input->post('codigo',TRUE),
    'titulo'    => $this->input->post('titulo',TRUE),
    'autor'     => $this->input->post('autor', TRUE),
    'editorial' => $this->input->post('editorial', TRUE),
    'anio'      => $this->input->post('anio', TRUE)
    );

  $data1 = array(
    'cod_curso'      => $this->input->post('curso', TRUE),
    'cod_libro' => $this->input->post('codigo',TRUE),
    'cod_estado'=> $this->input->post('estado', TRUE),
    'cod_caract'=> $this->input->post('caracteristica', TRUE),
    'paginas'=> $this->input->post('paginas', TRUE),
    'ciudad'=> $this->input->post('ciudad', TRUE),
    'obs'=> $this->input->post('obs', TRUE),
    'tema'=> $this->input->post('tema', TRUE)
    );

    $this->session->set_flashdata('editado', 'El libro fue modificado correctamente.');
    $this->modeldatos->actualizarLibro($id,$data);
    $this->modeldatos->actualizarLibroDetalle($id,$data1);
    redirect('home/verLibroAdmin');
}

public function buscarLibroAdmin() {
    $data = array();
    $session_data = $this->session->userdata('user');
    $query = $this->input->get('query', TRUE);

    if ($query) {
      $result = $this->modeldatos->getbuscarLibro(trim($query));
      $total = $this->modeldatos->totalResultados(trim($query));
      if ($result != FALSE){
        $data = array(
          'result' => $result,
          'total'  => $total
        );
      }else {
        $data = array('result' => '', 'total' => $total);
      } 
    }else{
      $data = array('result' => '', 'total' => 0);
    }


    $data['usuario'] = $session_data['usuario'];
    $this->load->view('administrador/headeradmin', $data);
    $this->load->view('administrador/buscar', $data);
    $this->load->view('administrador/footeradmin');
  }




}
?>