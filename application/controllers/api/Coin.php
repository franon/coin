<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Coin extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database('coin',TRUE);
        $this->load->model('Model_coin');
    }

    public function saldo_get(){

        $id = $this->get('id');
        $saldo = $this->Model_coin->getInfoSaldo($id);

        if ($id != NULL) {
            if ($saldo != NULL) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Saldo',
                    'data' => $saldo
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                'status' => FALSE,
                'message' => 'User Tidak ada'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }else{
            $this->response([
            'status' => FALSE,
            'message' => 'Tidak ada ID'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function saldo_put(){
        $id = $this->put('id');
        $saldoAwal = $this->Model_coin->getInfoSaldo($id)[0]->balance;
        $saldoPengurangan = $this->put('bayar');
        $data = [
            'balance' => $saldoAwal-$saldoPengurangan
        ];

        
        if($this->Model_coin->updateSaldo($data,$id) == TRUE){
            $this->response([
                'status' => true,
                'message' => 'Transaksi Berhasil'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Transaksi Gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function topUpSaldo_put(){
        $id = $this->put('id');
        var_dump($id);
        $saldoAwal = $this->Model_coin->getInfoSaldo($id)[0]->balance;
        $saldoTopUp = $this->put('topUp');
        $data = [
            'balance' => $saldoAwal+$saldoTopUp
        ];

        if($this->Model_coin->updateSaldo($data,$id) == TRUE){
            $this->response([
                'status' => true,
                'message' => 'Saldo berhasil di Top Up'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Tidak berhasil di Top Up'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}