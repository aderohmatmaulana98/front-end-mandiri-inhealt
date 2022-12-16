<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
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
    public function aksi_update_profile()
    {
        $username = $this->session->userdata('username');
        $url = 'https://thedaxdux.xyz/api/user_profile/update/' . $username;
        $curl = curl_init($url);

        $data = [
            'username' => $this->session->userdata('username'),
            'password' => $this->session->userdata('password'),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'bod' => $this->input->post('bod'),
            'email' => $this->input->post('email'),
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Diubah !
      </div>');
        redirect('user/index');
    }
}
