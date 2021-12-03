<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Resep
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller REST
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */
use chriskacerguis\RestServer\RestController;
class Resep extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('resep_model');
  }

  public function index_get()
  {
    $asal = $this->get('asal');
    if ($asal === null) {
      # code...
      $p = $this->get('page');
      $p = (empty($p) ? 1 : $p);
      $total_data = $this->resep_model->count();
      $total_page = ceil($total_data / 5 );
      $start = ($p - 1) * 5;

      $reseps = $this->resep_model->get(null, 5, $start);

      if($reseps) {
        $data = [
          'status'=>true,
          'page' => $p,
          'total_data' => $total_data,
          'total_page' => $total_page,
          'data'=> $reseps,
        ];
      }else {
        $data = [
          'status'=>false,
          'msg' => 'Data tidak ditemukan',
        ];
      }

      $this->response($data,RestController::HTTP_OK);
    }else {
      # code...
      // print($asal);
      $data = $this->resep_model->get($asal);
      if ($data) {
        # code...
        $this->response(['status'=>true,'data'=> $data],RestController::HTTP_OK);
      }else {
        # code...
        $this->response(['status'=>false,'msg'=> 'tidak ditemukan'],RestController::HTTP_NOT_FOUND);
      }
    }
  }

  public function index_post()
  {
    $data = [
      'nama_kuliner' => $this->post('nama_kuliner'),
      'asal' => $this->post('asal'),
      'kategori' => $this->post('kategori'),
      'gambar' => $this->post('gambar'),
      'durasi' => $this->post('durasi'),
      'porsi' => $this->post('porsi'),
      'bahan' => $this->post('bahan'),
      'resep' => $this->post('resep'),
    ];
    $simpan= $this->resep_model->add($data);
    if ($simpan['status']) {
      # code...
      $this->response(['status' =>true, 'msg' =>$simpan['data']. ' Data tekah ditambahkan'], RestController::HTTP_CREATED);
    }else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_put()
  {
    $data = [
      'nama_kuliner' => $this->put('nama_kuliner'),
      'asal' => $this->put('asal'),
      'kategori' => $this->put('kategori'),
      'gambar' => $this->put('gambar'),
      'durasi' => $this->put('durasi'),
      'porsi' => $this->put('porsi'),
      'bahan' => $this->put('bahan'),
      'resep' => $this->put('resep'),
    ];
    $id = $this->put('id');
    $simpan = $this->resep_model->update($id, $data);
    if ($simpan['status']) {
      # code...
      $status = (int)$simpan['data'];
      if ($status>0) {
        # code...

        $this->response(['status' =>true, 'msg' =>$simpan['data']. ' Data tekah dirubah'], RestController::HTTP_OK);
      }else {
        # code...
        $this->response(['status' =>true, 'msg' =>$simpan['data']. ' Tidak ada data yang diubah'], RestController::HTTP_BAD_REQUEST);
      }
    }else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_delete()
  {
    $id = $this->delete('id');
    $delete = $this->resep_model->delete($id);
    if ($delete['status']) {
      # code...
      $status = (int)$delete['data'];
      if ($status>0) {
        # code...

        $this->response(['status' =>true, 'msg' =>$id. ' Data tekah dihapus'], RestController::HTTP_OK);
      }else {
        # code...
        $this->response(['status' =>true, 'msg' =>$id. ' Tidak ada data yang dihapus'], RestController::HTTP_BAD_REQUEST);
      }
    }else {
      $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

}


/* End of file Resep.php */
/* Location: ./application/controllers/Resep.php */