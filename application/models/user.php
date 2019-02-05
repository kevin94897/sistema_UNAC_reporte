<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class User extends CI_Model
{
 function login($usuario, $password)
 {
   $this -> db -> select('idusuario, usuario, password');
   $this -> db -> from('usuarios');
   $this -> db -> where('usuario', $usuario);
   $this -> db -> where('password', MD5($password));
   $this -> db -> where('usuario_activo', "A");
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

function loginAdmin($usuario, $password)
 {
   $this -> db -> select('id_admin, admin, pass_admin');
   $this -> db -> from('administradores');
   $this -> db -> where('admin', $usuario);
   $this -> db -> where('pass_admin', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

function new_user($nombre,$correo,$nick,$password)
  {
       $data = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'usuario' => $nick,
            'password' => $password
        );
        return $this->db->insert('usuarios', $data);  
    }

function activarUsuario($password){
    $data=array('usuario_activo'=>"A");
    $this->db->where('password',$password);
    $this->db->update('usuarios',$data);
  }

}
?>