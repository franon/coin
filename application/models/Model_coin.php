<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_coin extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->coindb = $this->load->database('coin',TRUE);
    }

    public function getInfoSaldo($idcustomercoin){
        return $this->coindb->get_where('tcoin',['idcustomercoin' => $idcustomercoin])->result();
    }

    public function updateSaldo($data,$idcustomercoin){
        return $this->coindb->update('tcoin',$data,['idcustomercoin'=>$idcustomercoin]);
    }


}