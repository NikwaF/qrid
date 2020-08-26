<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model{

  public function prosesDaftarAkun()
  {
    $data = [
      'nama' => $this->input->post('nama', true),
      'username' => $this->input->post('username', true),
      'email' => $this->input->post('email', true),
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'id_level' => 2,
      'aktiv' => 1,
      'tgl_dibuat' => time()
    ];

    $this->db->insert('user', $data);
  }

}
