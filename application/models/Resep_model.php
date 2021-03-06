<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Resep_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Resep_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function getdata($asal,$id, $limit, $offset){
    if ($asal == null && $id == null) {
      # code...
      return $this->db->get('resep',$limit, $offset)->result();
    }else if ($asal !== null){
      # code...
      return $this->db->get_where('resep',['asal' => $asal])->result_array();
    } 
    else if ($id !== null){
      return $this->db->get_where('resep',['id' => $id])->result();
    }
  }

  public function count()
  {
    return $this->db->get('resep')->num_rows();
  }

  public function add($data)
  {
    try {
      //code...
      $this->db->insert('resep', $data);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        # code...
        throw new Exception('Terjadi Kesalahan: '.$error['message']);
        return false;
      }
      return ['status'=>true, 'data'=>$this->db->affected_rows()];
    } catch (Exception $ex) {
      //throw $th;
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function update($id, $data)
  {
    try {
      //code...
      $this->db->update('resep', $data, ['id' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        # code...
        throw new Exception('Terjadi Kesalahan: '.$error['message']);
        return false;
      }
      return ['status'=>true, 'data'=>$this->db->affected_rows()];
    } catch (Exception $ex) {
      //throw $th;
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }
  
  public function delete($id)
  {
    try {
      //code...
      $this->db->delete('resep',  ['id' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        # code...
        throw new Exception('Terjadi Kesalahan: '.$error['message']);
        return false;
      }
      return ['status'=>true, 'data'=>$this->db->affected_rows()];
    } catch (Exception $ex) {
      //throw $th;
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

}

/* End of file Resep_model.php */
/* Location: ./application/models/Resep_model.php */