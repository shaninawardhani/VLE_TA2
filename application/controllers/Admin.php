<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_privilege();
        $this->load->model('Kelas_model', '', true);
        $this->load->model('User_model', '', true);
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->User_model->getUserGuru();
        $data['siswa'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/index', $data);
        $this->loadtemplateslast();
    }

    public function ubah_profile($id)
    {
        $data['title'] = '';
        $data['subtitle'] = 'Ubah Akun';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserGuru();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/ubah_profile', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_akun($id)
    {
        $data = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            #"kelas_id" => $this->input->post("kelas_id"),
            "nuptk_nisn" => $this->input->post("nuptk"),
            "jabatan" => $this->input->post("jabatan"),
        );

        #config file upload
        $config['upload_path'] = './assets/img/profile';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';

        $this->load->library('upload', $config);
        if (empty($_FILES['image']['name'])) {
            //
            if ($this->User_model->updateAkun($id, $data)) {
                $this->session->set_flashdata('success', 'Image berhasil diubah');
                redirect(site_url("admin"));
            } else {
                redirect(site_url("admin/ubah_profile/$id"));
            }
        } else {
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("admin/ubah_profile/$id"));
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = base_url("assets/img/profile/") . $upload_data['file_name'];
                if ($this->User_model->updateAkun($id, $data)) {
                    $this->session->set_flashdata('success', 'Image berhasil diunggah');
                    redirect(site_url("admin"));
                } else {
                    redirect(site_url("admin/ubah_profile/$id"));
                }
            }
        }
    }

    public function ubah_password($id)
    {
        $data['title'] = '';
        $data['subtitle'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUser();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/ubah_password', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_password($id)
    {
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'password tidak sama!!',
            'min_length' => 'password harus minimal 8 karakter!!'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('ubah_password_sendiri', '<div class="alert alert-danger" role="alert">Password gagal diganti !! </div>');
            redirect(site_url("admin/ubah_password/$id"));
        } else {
            $this->User_model->updatePassword($id);
            $this->session->set_flashdata('ubah_password_sendiri', '<div class="alert alert-primary" role="alert">Password berhasil diganti!! </div>');
            redirect(site_url("admin"));
        }
    }

    #AkunBegin

    public function akun()
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Kelola Akun Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/akun', $data);
        $this->loadtemplateslast();
    }

    public function buka_halaman_akun_guru()
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Akun Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->User_model->getUserGuru();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/halaman_akun_guru', $data);
        $this->loadtemplateslast();
    }

    public function tambah_akun_guru()
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Form Tambah Akun Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/form_tambah_akun_guru', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_akun_guru()
    {
        $this->form_validation->set_rules('email', 'email', 'is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!!'
        ]);
        $this->form_validation->set_rules('unptk', 'unptk', 'is_unique[user.nuptk_nisn]', [
            'is_unique' => 'UNPTK sudah terdaftar!!',
        ]);
        if ($this->form_validation->run()) {
            if ($this->User_model->insertUserGuru()) {
                $this->session->set_flashdata('tambah_akun', '');
                redirect(site_url("admin/buka_halaman_akun_guru"));
            } else {
                $this->session->set_flashdata('tambah_akun', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun guru </div>');
                redirect(site_url("admin/tambah_akun_guru"));
            }
        } else {
            $this->session->set_flashdata('tambah_akun', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun guru </div>');
            redirect(site_url("admin/tambah_akun_guru"));
        }
    }

    public function buka_akun_guru($id)
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Data Akun Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserGuru();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        #$id_kelas = $this->db->query("SELECT kelas_id FROM user WHERE id = $id");
        #$data['kelas'] = $this->Kelas_model->getKelasById($id_kelas);
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/halaman_detail_akun_guru', $data);
        $this->loadtemplateslast();
    }


    public function ubah_akun_guru($id)
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Form Ubah Akun Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserGuru();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/form_ubah_akun_guru', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_akun_guru($id)
    {
        $data = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "kelas_id" => $this->input->post("kelas_id"),
            "nuptk_nisn" => $this->input->post("nuptk"),
            "jabatan" => $this->input->post("jabatan"),
        );

        #config file upload
        $config['upload_path'] = './assets/img/profile';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';

        $this->load->library('upload', $config);
        if (empty($_FILES['image']['name'])) {
            //
            if ($this->User_model->updateGuru($id, $data)) {
                $this->session->set_flashdata('success', 'Image berhasil diubah');
                redirect(site_url("admin/buka_akun_guru/$id"));
            } else {
                redirect(site_url("admin/ubah_akun_guru/$id"));
            }
        } else {
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("admin/buka_akun_guru/$id"));
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = base_url("aassets/img/profile/") . $upload_data['file_name'];
                if ($this->User_model->updateGuru($id, $data)) {
                    $this->session->set_flashdata('success', 'Image berhasil diunggah');
                    redirect(site_url("admin/buka_akun_guru/$id"));
                } else {
                    redirect(site_url("admin/ubah_akun_guru/$id"));
                }
            }
        }

        if ($this->User_model->updateGuru($id)) {
            redirect(site_url("admin/buka_akun_guru/$id"));
        } else {
            redirect(site_url("admin/ubah_akun_guru/$id"));
        }
    }
    public function ubah_password_akun($id)
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Form Ubah Password Akun Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUser();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/form_password_akun', $data);
        $this->loadtemplateslast();
    }

    public function buka_halaman_akun_siswa()
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/halaman_akun_siswa', $data);
        $this->loadtemplateslast();
    }
    public function tambah_akun_siswa()
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Form Tambah Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/form_tambah_akun_siswa', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_akun_siswa()
    {
        $this->form_validation->set_rules('email', 'email', 'is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!!',
        ]);
        $this->form_validation->set_rules('nisn', 'nisn', 'is_unique[user.nuptk_nisn]', [
            'is_unique' => 'NISN sudah terdaftar!!',
        ]);
        if ($this->form_validation->run()) {
            if ($this->User_model->insertUserSiswa()) {
                $this->session->set_flashdata('tambah_akun_siswa', '');
                redirect(site_url("admin/buka_halaman_akun_siswa"));
            } else {
                $this->session->set_flashdata('tambah_akun_siswa', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun siswa </div>');
                redirect(site_url("admin/tambah_akun_siswa"));
            }
        } else {
            $this->session->set_flashdata('tambah_akun_siswa', '<div class="alert alert-danger" role="alert">Gagal menambahkan akun siswa </div>');
            redirect(site_url("admin/tambah_akun_siswa"));
        }
    }

    public function buka_akun_siswa($id)
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Data Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        #$id_kelas = $this->db->query("SELECT kelas_id FROM user WHERE id = $id");
        #$data['kelas'] = $this->Kelas_model->getKelasById($id_kelas);
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/halaman_detail_akun_siswa', $data);
        $this->loadtemplateslast();
    }

    public function ubah_akun_siswa($id)
    {
        $data['title'] = 'Akun';
        $data['subtitle'] = 'Form Ubah Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/form_ubah_akun_siswa', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_akun_siswa($id)
    {

        if ($this->User_model->updateSiswa($id)) {
            redirect(site_url("admin/buka_akun_siswa/$id"));
        } else {
            redirect(site_url("admin/ubah_akun_siswa/$id"));
        }
    }

    public function hapus_akun($id)
    {
        $this->User_model->deleteAkun($id);
        redirect(site_url("admin/akun"));
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!!',
            'valid_email' => 'Alamat Email tidak benar!!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'password tidak sama!!',
            'min_length' => 'password harus minimal 8 karakter!!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            Akun berhasil dibuat!!! </div>');
            redirect('auth');
        }
    }

    public function proses_ubah_password_akun($id)
    {
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'password tidak sama!!',
            'min_length' => 'password harus minimal 8 karakter!!'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            redirect(site_url("admin/ubah_password_akun/$id"));
        } else {
            $this->User_model->updatePassword($id);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            Password berhasil diganti!! </div>');
            redirect(site_url("admin/akun"));
        }
    }

    #AkunEnd

    #KelasBegin

    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['subtitle'] = 'Kelola Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/kelas', $data);
        $this->loadtemplateslast();
    }

    public function tambah_kelas()
    {
        $data['title'] = 'Kelas';
        $data['subtitle'] = 'Form Tambah Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/tambah_kelas', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_kelas()
    {
        if ($this->Kelas_model->insertKelas()) {
            redirect(site_url("admin/kelas"));
        } else {
            redirect(site_url("admin/tambah_kelas"));
        }
    }

    public function ubah_kelas($id)
    {
        $data['title'] = 'Kelas';
        $data['subtitle'] = 'Form Ubah Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getKelas();
        $data['kelas'] = $this->Kelas_model->getKelasById($id)->row();
        $this->loadtemplatesfirst($data);
        $this->load->view('admin/ubah_kelas', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_kelas($id)
    {
        if ($this->Kelas_model->updateKelas($id)) {
            redirect(site_url("admin/kelas"));
        } else {
            redirect(site_url("admin/ubah_kelas/$id"));
        }
    }

    public function hapus_kelas($id)
    {
        $this->Kelas_model->deleteKelas($id);
        redirect(site_url("admin/kelas"));
    }

    #KelasEnd

    public function loadtemplatesfirst($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
    }
    public function loadtemplateslast()
    {
        $this->load->view('templates/footer');
    }
}
