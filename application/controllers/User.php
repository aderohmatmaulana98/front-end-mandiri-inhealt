<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
    }
    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['password'] = $this->session->userdata('password');
        $data['name'] = $this->session->userdata('name');
        $data['address'] = $this->session->userdata('address');
        $data['bod'] = $this->session->userdata('bod');
        $data['email'] = $this->session->userdata('email');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://thedaxdux.xyz/api//User_profile/GetUserProfileByUsername/" . $data['username']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $hasil = curl_exec($ch);
        curl_close($ch);

        $tampung = json_decode($hasil);

        $data['username1'] = $tampung->username;
        $data['name1'] = $tampung->name;
        $data['address1'] = $tampung->address;
        $data['bod1'] = $tampung->bod;
        $data['email1'] = $tampung->email;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }
    public function form_update_profil()
    {
        $data['username'] = $this->session->userdata('username');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://thedaxdux.xyz/api//User_profile/GetUserProfileByUsername/" . $data['username']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $hasil = curl_exec($ch);
        curl_close($ch);

        $tampung = json_decode($hasil);

        $data['username1'] = $tampung->username;
        $data['name1'] = $tampung->name;
        $data['address1'] = $tampung->address;
        $data['bod1'] = $tampung->bod;
        $data['email1'] = $tampung->email;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/form_update_profile', $data);
        $this->load->view('template/footer');
    }
    public function aksi_update_profile()
    {
        $username = $this->session->userdata('username');
        $url = 'https://thedaxdux.xyz/api/user_profile/update/' . $username;

        $data = [
            'username' => $this->session->userdata('username'),
            'password' => $this->session->userdata('password'),
            'name' => $this->input->post_get('name'),
            'address' => $this->input->post_get('address'),
            'bod' => $this->input->post_get('bod'),
            'email' => $this->input->post_get('email'),
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);

        if (!$response) {
            return false;
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Diubah !
      </div>');
        redirect('user/index');
    }
    public function skill()
    {
        $data['username'] = $this->session->userdata('username');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://thedaxdux.xyz/api/skill/GetSkills");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $hasil = curl_exec($ch);
        curl_close($ch);

        $tampung = json_decode($hasil, true);
        // $tampung = json_decode($tampung[0]);
        $data['skill_id'] = $tampung;
        // var_dump($data['skill_id']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/skill', $data);
        $this->load->view('template/footer');
    }
    public function form_add_skill()
    {
        $data['username'] = $this->session->userdata('username');

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/form_add_skill', $data);
        $this->load->view('template/footer');
    }
    public function aksi_add_skill()
    {
        $url = 'https://thedaxdux.xyz/api/skill/create';
        $curl = curl_init($url);

        $data = [
            'skill_id' => $this->input->post('skill_id'),
            'skill_name' => $this->input->post('skill_name'),
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akun berhasil dibuat !
      </div>');
        redirect('user/skill');
    }
    public function form_edit_skill($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://thedaxdux.xyz/api/skill/skill_by_id/" . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $hasil = curl_exec($ch);
        curl_close($ch);
        var_dump($hasil);
        die;
    }
}
