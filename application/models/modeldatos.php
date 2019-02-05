<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class modeldatos extends CI_Model
{

function getLibro()
{
    $this->db->from('libro');
    $this->db->order_by('titulo','asc');
    $query =$this->db->get();
    return $query->result();
	}
function getbuscarLibro($query)
{
  $this->db->like('titulo',$query);
  $query = $this->db->get('libro');
  if($query->num_rows()>0){
    return $query->result();
  }else{
    return FALSE;
  }
}
/****PAGINACIÓN Y BUSQUEDA DE LIBROS POR CURSO******/
public function numerolibrosporCurso($query) {
    $this->db->from('libro l');
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->where('r.cod_curso',$query);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return FALSE;
    }
  }

public function limitelibrosporCurso($query,$limit, $start) {
      
      $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
      $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
      $this->db->where('r.cod_curso',$query);
      $this->db->order_by('l.titulo','asc');
        $query = $this->db->get("libro l",$limit, $start);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

/*****/ 

/****PAGINACIÓN Y MOSTRAR CATALOGO DE LIBROS******/

public function limiteLibros($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('titulo','asc');
        $query = $this->db->get("libro");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

public function numeroLibros() {
  return $this->db->count_all("libro");
}

/*****/

/****PAGINACIÓN Y BUSQUEDA DE LIBROS POR TITULO******/

public function numerolibrosporTitulo($query) {
    $this->db->from('libro l');
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->like('l.titulo',$query);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return FALSE;
    }
}


public function limiteLibrosTitulo($query,$limit, $start) {
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->like('l.titulo',$query);
    $this->db->order_by('l.titulo','asc');
    $query = $this->db->get("libro l",$limit, $start);

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
          $data[] = $row;
        }
      return $data;
    }
      return false;
   }

/*****/


/****PAGINACIÓN Y BUSQUEDA DE LIBROS POR AUTOR******/

public function numerolibrosporAutor($query) {
    $this->db->from('libro l');
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->like('l.autor',$query);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return FALSE;
    }
}


public function limiteLibrosAutor($query,$limit, $start) {
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->like('l.autor',$query);
    $this->db->order_by('l.titulo','asc');
    $query = $this->db->get("libro l",$limit, $start);

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
          $data[] = $row;
        }
      return $data;
    }
      return false;
   }

/*****/


/****PAGINACIÓN Y BUSQUEDA DE LIBROS POR EDITORIAL******/

public function numerolibrosporEditorial($query) {
    $this->db->from('libro l');
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->like('l.editorial',$query);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->num_rows();
    }else{
      return FALSE;
    }
}


public function limiteLibrosEditorial($query,$limit, $start) {
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->like('l.editorial',$query);
    $this->db->order_by('l.titulo','asc');
    $query = $this->db->get("libro l",$limit, $start);

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
          $data[] = $row;
        }
      return $data;
    }
      return false;
   }

/*****/



function getdetalleLibro($id)
{
	$this->db->from('libro l');
  $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
  $this->db->join('libro_caract c', 'd.cod_caract=c.cod_caract', 'left');
  $this->db->join('libro_estado e', 'd.cod_estado=e.cod_estado', 'left');
  $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
  $this->db->where('l.cod_libro',$id);
  $query = $this->db->get();
  return $query->result();
}

function getcomboCursos(){
  $query = $this->db->get('curso');
  if($query->num_rows()>0){
    return $query->result();
  }else{
    return FALSE;
  }
}

function getlibroporCurso2($query)
{
  $this->db->where('cod_curso',$query);
  $query = $this->db->get('curso');
  if($query->num_rows()>0){
    return $query->result();
  }else{
    return FALSE;
  }
}
/*
function buscarporBiblioteca1($query)
  {
    $this->db->where('cod_biblio',1);
    $this->db->like('titulo',$query);
    $query = $this->db->get('libro');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return FALSE;
    }
  }

function buscarporBiblioteca2($query)
  {
    $this->db->where('cod_biblio',2);
    $this->db->like('titulo',$query);
    $query = $this->db->get('libro');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return FALSE;
    }
  }
*/

function biblioteca(){
  $this->db->select('biblio_lugar');
  $this->db->from('biblioteca b'); 
  $this->db->order_by('l.titulo','asc');         
  $query = $this->db->get(); 
  if($query->num_rows() != 0)
  {
       return $query->result_array();
  }
  else
  {
       return false;
  }
}

function porCodLibro($id) {
  $this->db->where('cod_libro', $id);
  $this->db->limit(1);
  $query = $this->db->get('libro');
  $libro = $query->row();
  return $libro;
}




/*VISTA ADMINISTRADOR*/
function getLibroAdmin()
{
    $this->db->from('libro l');
    $this->db->join('libro_detalle d', 'l.cod_libro=d.cod_libro', 'left');
    $this->db->join('libro_caract c', 'd.cod_caract=c.cod_caract', 'left');
    $this->db->join('libro_estado e', 'd.cod_estado=e.cod_estado', 'left');
    $this->db->join('curso r', 'r.cod_curso=d.cod_curso', 'left');
    $this->db->order_by('titulo','asc');
    $query =$this->db->get();
    return $query->result();
  }

function getEstadoLibroAdmin()
{
  $this->db->from('libro_estado');
  $query =$this->db->get();
  
    return $query->result();
}
function getCursoLibroAdmin()
{
  $this->db->from('curso');
  $query =$this->db->get();
  
    return $query->result();
}
function getCaractLibroAdmin()
{
  $this->db->from('libro_caract');
  $query =$this->db->get();
    return $query->result();
}

function guardarLibro($data){
    $this->db->insert('libro', $data);
  }

function guardarLibroDetalle($data1){
    $this->db->insert('libro_detalle', $data1);
  }

function eliminarLibro($id){
    $this->db->where('cod_libro', $id);
    $this->db->delete('libro');
  }

function eliminarDetalleLibro($id){
    $this->db->where('cod_libro', $id);
    $this->db->delete('libro_detalle');
  }

function editarLibro($id){
    $this->db->where('cod_libro', $id);
    $query = $this->db->get('libro');
    if ($query->num_rows()> 0){
      return $query;
    }else{
      return FALSE;
    }
  }

function editarLibroDetalle($id){
    $this->db->where('cod_libro', $id);
    $query = $this->db->get('libro_detalle');
    if ($query->num_rows()> 0){
      return $query;
    }else{
      return FALSE;
    }
  }


function actualizarLibro($id,$data)
{
  $this->db->where('cod_libro', $id);
  $this->db->update('libro',$data);
}

function actualizarLibroDetalle($id,$data)
{
  $this->db->where('cod_libro', $id);
  $this->db->update('libro_detalle',$data);
}

function buscarLibro($query) {

    $this->db->like('titulo', $query);
    $query = $this->db->get('libro');
    if ($query->num_rows() > 0){
      return $query;
    }else{
      return FALSE;
    }
  }

function totalResultados($query){
    $this->db->like('titulo', $query);
    $query = $this->db->get('libro');
    return $query->num_rows();
  }

}
?>