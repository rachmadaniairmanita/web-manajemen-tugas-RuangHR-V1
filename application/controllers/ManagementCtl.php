<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementCtl extends CI_Controller {
	public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('welcome');
        }
        $session_data = $this->session->userdata('logged_in');
        if($session_data['id_grup'] != "1"){
            redirect('welcome/redirecting');
        }
        $this->load->model('account');
        $this->load->model('management');
        // if($session_data['nama_user']==""){
        //     redirect("hrdctl/profile");
        // }
        $data = $this->management->getAllData();
        // $allTask = $this->hrd->getAllTask($session_data['id_departemen']);
        // $tugas= $this->account->getAllJob($session_data['id_member']);
        $this->load->view("management/dashboard", array('nama' => $session_data['nama_user'], 'msg' => '', 'error'=>'', 'data'=>$data));
    }

    public function daftarAnggota(){
        if(!$this->session->userdata('logged_in')){
            redirect('welcome');
        }
        $session_data = $this->session->userdata('logged_in');
        if($session_data['id_grup'] != "1"){
            redirect('welcome/redirecting');
        }
        $this->load->model('account');
        $this->load->model('management');
        // if($session_data['nama_user']==""){
        //     redirect("hrdctl/profile");
        // }
        $data = $this->management->getAllAnggota();
        // $allTask = $this->hrd->getAllTask($session_data['id_departemen']);
        // $tugas= $this->account->getAllJob($session_data['id_member']);
        $this->load->view("management/daftarAnggota", array('nama' => $session_data['nama_user'], 'msg' => '', 'error'=>'', 'data'=>$data));
    }

    public function profile(){
        if(!$this->session->userdata('logged_in')){
            redirect('welcome');
        }
        $session_data = $this->session->userdata('logged_in');
        if($session_data['id_grup'] != "1"){
            redirect('welcome/redirecting');
        }
        $this->load->model('account');
        $this->load->model('management');
        $detailProfile = $this->management->getProfileDetail($session_data['id_user']);
        $this->load->view("management/profile", array('nama' => $session_data['nama_user'], "detail"=>$detailProfile));
    }


    public function updateProfile(){
        if(!$this->session->userdata('logged_in')){
            redirect('welcome');
        }
        $session_data = $this->session->userdata('logged_in');
        if($session_data['id_grup'] != "1"){
            redirect('welcome/redirecting');
        }
        $this->load->model('account');
        $this->load->model('management');
        $profile = $this->management->updateProfileDetail($session_data['id_user']);
        // $tugas= $this->account->getAllJob($session_data['id_member']);
        if($session_data['nama_user']==""){
            redirect('accountctl/logout');
        }else{
            redirect('managementctl/profile');
        }
    }
    
}
