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

public function numeroLibros() {
        return $this->db->count_all("libro");
    }

public function limiteLibros($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->join('biblioteca', 'libro.cod_biblio = biblioteca.cod');
        $query = $this->db->get("libro");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


function getdetalleLibro($id)
{
	$this->db->from('libro');
  $this->db->join('biblioteca', 'libro.cod_biblio = biblioteca.cod');
  $this->db->where('cod_libro',$id);
  $query = $this->db->get();
  return $query->result();
}

function getnumbusquedaLibro($buscador)
{
  $this->db->like('titulo', $buscador);
  $query = $this->db->get('libro');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return FALSE;
    }
}

function getbuscarLibro($buscador,$por_pagina,$segmento)
{
  $this->db->like('titulo',$buscador);
  $query = $this->db->get('libro', $por_pagina, $segmento);
  if($query->num_rows()>0){
    foreach ($query->result() as $row) {
            $data[] = $row;
        }
            return $data;
  }else{
    return FALSE;
  }
}

function buscarporAutor($query)
  {
    $this->db->like('autor',$query);
    $query = $this->db->get('libro');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return FALSE;
    }
  }

function buscarporEditorial($query)
  {
    $this->db->like('editorial',$query);
    $query = $this->db->get('libro');
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return FALSE;
    }
  }

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


function biblioteca(){
  $this->db->select('biblio_lugar');
  $this->db->from('biblioteca b'); 
  $this->db->join('libro l', 'b.cod=l.cod_biblio', 'left');
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
   $query = $this->db->get('libro');
   foreach ($query->result() as $libro) {
      $data[] = $libro;
  }
   return $libro;
  }


}
?>