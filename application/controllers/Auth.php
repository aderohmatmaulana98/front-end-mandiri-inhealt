<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->view('auth/index');
    }
    public function login()
    {
        $url = 'https://thedaxdux.xyz/api/auth';
        $curl = curl_init($url);

        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $tampung = json_decode($result);

        if ($tampung->error == false) {
            $data = [
                'username' => $tampung->Result->username,
                'password' => $tampung->Result->password,
                'name' => $tampung->Result->name,
                'address' => $tampung->Result->address,
                'bod' => $tampung->Result->bod,
                'email' => $tampung->Result->email,
            ];
            // var_dump($data);
            // die;
            $this->session->set_userdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Login !
      </div>');
            redirect('user/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Login Gagal, silahkan cek username atau password !
      </div>');
            redirect('auth/index');
        }
    }
    public function register()
    {
        $this->load->view('auth/register');
    }
    public function aksi_register()
    {
        $url = 'https://thedaxdux.xyz/api/register';
        $curl = curl_init($url);

        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
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
        Akun berhasil dibuat !
      </div>');
        redirect('auth/index');
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('address');
        $this->session->unset_userdata('bod');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akun berhasil Logout !
      </div>');
        redirect('auth/index');
    }
}
