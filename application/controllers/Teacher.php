<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_privilege();
        $this->load->model('Materi_model', '', true);
        $this->load->model('Penugasan_model', '', true);
        $this->load->model('Kelas_model', '', true);
        $this->load->model('User_model', '', true);
        $this->load->model('Tema_model', '', true);
        $this->load->model('Tugas_model', '', true);
        $this->load->model('Kuis_model', '', true);
        $this->load->model('Soal_model', '', true);
        $this->load->model('Status_kuis_model', '', true);
        $this->load->model('Status_tugas_model', '', true);
        $this->load->model('Jawaban_model', '', true);
        $this->load->model('Nilai_kuis_model', '', true);
        #$this->load->model('Nilai_tugas_model', '', true);
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/index', $data);
        $this->loadtemplateslast();
    }

    public function ubah_profile($id)
    {
        $data['title'] = '';
        $data['subtitle'] = 'Ubah Profil Anda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserGuru();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/ubah_profile', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_akun($id)
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
            if ($this->User_model->updateAkun($id, $data)) {
                $this->session->set_flashdata('success', 'Image berhasil diubah');
                redirect(site_url("teacher"));
            } else {
                redirect(site_url("teacher/ubah_profile/$id"));
            }
        } else {
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("teacher/ubah_profile/$id"));
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = base_url("assets/img/profile/") . $upload_data['file_name'];
                if ($this->User_model->updateAkun($id, $data)) {
                    $this->session->set_flashdata('success', 'Image berhasil diunggah');
                    redirect(site_url("teacher"));
                } else {
                    redirect(site_url("teacher/ubah_profile/$id"));
                }
            }
        }
    }

    public function ubah_password($id)
    {
        $data['title'] = '';
        $data['subtitle'] = 'Form Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUser();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/ubah_password', $data);
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
            redirect(site_url("teacher/ubah_password/$id"));
        } else {
            $this->User_model->updatePassword($id);
            $this->session->set_flashdata('ubah_password_sendiri', '<div class="alert alert-primary" role="alert">Password berhasil diganti!! </div>');
            redirect(site_url("teacher"));
        }
    }

    #MateriBegin

    public function materi()
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = 'Daftar Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->Materi_model->getAllMateri();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['tema'] = $this->Tema_model->getTema();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/materi', $data);
        $this->loadtemplateslast();
    }
    public function tambah_materi()
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = 'Form Tambah Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->Materi_model->getAllMateri();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['tema'] = $this->Tema_model->getTema();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_tambah_materi', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_materi()
    {
        $data = array(
            "user_id" => $this->input->post("user_id"),
            "nama_file" => $this->input->post("nama_file"),
            "tema_id" => $this->input->post("tema_id"),
            "kelas_id" => $this->input->post("kelas_id"),
            "is_active" => 1
        );

        #config file upload
        $config['upload_path'] = './assets/file/materi';
        $config['allowed_types'] = 'jpg|png|jpeg|mp4|docx|pptx|ppt|mkv|doc|pdf|zip|rar|mp3|aac';
        $config['max_size'] = 100000;

        $this->load->library('upload', $config);
        if (empty($_FILES['file_materi']['name'])) {
            //
            if ($this->Materi_model->insertMateri($data)) {
                $this->session->set_flashdata('success', 'Materi berhasil ditambahkan');
                redirect(site_url("teacher/materi"));
            } else {
                redirect(site_url("teacher/tambah_materi"));
            }
        } else {
            if (!$this->upload->do_upload('file_materi')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("teacher/materi"));
            } else {
                $upload_data = $this->upload->data();
                $data['file_materi'] = base_url("assets/file/materi/") . $upload_data['file_name'];
                if ($this->Materi_model->insertMateri($data)) {
                    $this->session->set_flashdata('success', 'Materi berhasil ditambahkan');
                    redirect(site_url("teacher/materi"));
                } else {
                    redirect(site_url("teacher/tambah_materi"));
                }
            }
        }
    }
    public function buka_materi($id)
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = 'Buka Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->Materi_model->getMateriById($id)->row_array();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_buka_materi', $data);
        $this->loadtemplateslast();
    }
    public function ubah_materi($id)
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = 'Ubah Data Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->Materi_model->getAllMateri();
        $data['materi'] = $this->Materi_model->getMateriById($id)->row();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['tema'] = $this->Tema_model->getTema();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_ubah_materi', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_materi($id)
    {
        $data = array(
            "nama_file" => $this->input->post("nama_file"),
            "tema_id" => $this->input->post("tema_id"),
            "kelas_id" => $this->input->post("kelas_id"),
            "is_active" => 1
        );

        #config file upload
        $config['upload_path'] = './assets/file/materi';
        $config['allowed_types'] = 'jpg|png|jpeg|mp4|docx|pptx|ppt|mkv|doc|pdf|zip|rar|mp3|aac';
        $config['max_size'] = 100000;

        $this->load->library('upload', $config);
        if (empty($_FILES['file_materi']['name'])) {
            //
            if ($this->Materi_model->updateMateri($data, $id)) {
                $this->session->set_flashdata('success', 'Materi berhasil ditambahkan');
                redirect(site_url("teacher/materi"));
            } else {
                redirect(site_url("teacher/ubah_materi/" . $id));
            }
        } else {
            if (!$this->upload->do_upload('file_materi')) {
                $this->session->set_flashdata('error', 'File yang dinputkan tidak sesuai. Masukan file dengan format yang diterima');
                redirect(site_url("teacher/materi"));
            } else {
                $upload_data = $this->upload->data();
                $data['file_materi'] = base_url("assets/file/materi/") . $upload_data['file_name'];
                if ($this->Materi_model->updateMateri($data, $id)) {
                    $this->session->set_flashdata('success', 'Materi berhasil ditambahkan');
                    redirect(site_url("teacher/materi"));
                } else {
                    redirect(site_url("teacher/ubah_materi/" . $id));
                }
            }
        }
    }

    public function hapus_materi($id)
    {
        $this->Materi_model->deleteMateri($id);
        redirect(site_url("teacher/materi"));
    }

    #MateriEnd

    #PenugasanBegin

    public function penugasan()
    {
        $data['title'] = 'Penugasan';
        $data['subtitle'] = 'Daftar Penugasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/penugasan', $data);
        $this->loadtemplateslast();
    }

    public function tambah_penugasan()
    {
        $data['title'] = 'Penugasan';
        $data['subtitle'] = 'Form Tambah Penugasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();
        $data['tema'] = $this->Tema_model->getTema();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_tambah_penugasan', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_penugasan()
    {
        $akun_siswa = $this->input->post('user_id_siswa');
        $data_status = array();
        $this->setValidationRulesTambahpenugasan();
        if ($this->form_validation->run()) {
            $data = array(
                "user_id" => $this->input->post("user_id"),
                "tema_id" => $this->input->post("tema_id"),
                "kelas_id" => $this->input->post("kelas_id"),
                "judul_penugasan" => $this->input->post("judul_penugasan"),
                "deskripsi_tugas" => $this->input->post("deskripsi"),
                "due_date" => date("Y-m-d H:i:s", strtotime($this->input->post("due_date")))
            );
            $this->db->set($data);
            $this->db->insert("penugasan");
            $this->session->set_flashdata('penugasan_id', $this->db->insert_id());

            $data_status = array();
            foreach ($akun_siswa as $key => $val) {
                $data_status[] = array(
                    "user_id_siswa" => $_POST['user_id_siswa'][$key],
                    "kelas_id" => $_POST['kelas_id_siswa'][$key],
                    "penugasan_id" => $this->db->insert_id()
                );
            }

            #untuk status ke siswa
            $this->db->insert_batch('status_tugas', $data_status);

            #untuk nilai ke siswa
            $this->db->insert_batch('nilai_penugasan', $data_status);

            redirect(site_url("teacher/penugasan"));
        } else {
            redirect(site_url("teacher/tambah_penugasan"));
        }
    }

    public function ubah_penugasan($id)
    {
        $data['title'] = 'Penugasan';
        $data['subtitle'] = 'Ubah Data Penugasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();
        $data['penugasan'] = $this->Penugasan_model->getPenugasanById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_ubah_penugasan', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_penugasan($id)
    {
        if ($this->Penugasan_model->updatePenugasan($id)) {
            redirect(site_url("teacher/penugasan"));
        } else {
            redirect(site_url("teacher/ubah_penugasan/" . $id));
        }
    }

    public function hapus_penugasan($id)
    {
        $this->Penugasan_model->deletePenugasan($id);
        redirect(site_url("teacher/penugasan"));
    }

    public function buka_daftar_tugas($id)
    {
        $data['title'] = 'Penugasan';
        $data['subtitle'] = 'Penugasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['penugasan'] = $this->Penugasan_model->getPenugasanById($id)->row();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->session->set_flashdata('id_penugasan', $id);
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_daftar_tugas', $data);
        $this->loadtemplateslast();
    }

    public function buka_detail_tugas($id)
    {
        $data['title'] = 'Penugasan';
        $data['subtitle'] = 'Tugas Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['tugas'] = $this->Tugas_model->getTugasById($id)->row_array();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();

        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_buka_tugas', $data);
        $this->loadtemplateslast();
    }

    public function buka_tabel_nilai_tugas()
    {
        $data['title'] = 'Penugasan';
        $data['subtitle'] = 'Tabel Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_tabel_nilai_tugas', $data);
        $this->loadtemplateslast();
    }

    public function proses_nilai_tugas($id)
    {
        $idPenugasan = $this->session->flashdata('id_penugasan');
        if ($this->Tugas_model->updateNilai($id)) {
            redirect(site_url("teacher/buka_daftar_tugas/$idPenugasan"));
        } else {
            redirect(site_url("teacher/buka_detail_tugas/$id"));
        }
    }

    #PenugasanEnd

    #KuisBegin

    public function kuis()
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Daftar Kuis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/kuis', $data);
        $this->loadtemplateslast();
    }

    public function tambah_kuis()
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Form Tambah Kuis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_tambah_kuis', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_kuis()
    {
        $akun_siswa = $this->input->post('user_id_siswa');
        $data_status = array();

        $data_tipe = $this->input->post("tipe_soal");
        $this->session->set_flashdata('jumlah_soal', $this->input->post("jumlah_soal"));
        $this->setValidationRulesTambahKuis();
        if ($this->form_validation->run()) {
            $data = array(
                "user_id" => $this->input->post("user_id"),
                "tema_id" => $this->input->post("tema_id"),
                "kelas_id" => $this->input->post("kelas_id"),
                "judul_kuis" => $this->input->post("judul_kuis"),
                "tipe_soal" => $this->input->post("tipe_soal"),
                "due_date" => date("Y-m-d H:i:s", strtotime($this->input->post("due_date")))
            );
            $this->db->set($data);
            $this->db->insert("kuis");
            $this->session->set_flashdata('kuis_id', $this->db->insert_id());

            $data_status = array();
            foreach ($akun_siswa as $key => $val) {
                $data_status[] = array(
                    "user_id_siswa" => $_POST['user_id_siswa'][$key],
                    "kelas_id" => $_POST['kelas_id_siswa'][$key],
                    "kuis_id" => $this->db->insert_id()
                );
            }
            #untuk status ke siswa
            $this->db->insert_batch('status_kuis', $data_status);
            #untuk nilai ke siswa
            $this->db->insert_batch('nilai_kuis', $data_status);

            if ($data_tipe == "Pilihan Ganda") {
                redirect(site_url("teacher/buat_soal_pg"));
            } else {
                redirect(site_url("teacher/buat_soal_isian"));
            }
        } else {
            redirect(site_url("teacher/tambah_tugas"));
        }
    }
    public function buat_soal_pg()
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Buat Soal Pilihan Ganda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['jml_soal'] = $this->session->flashdata('jumlah_soal');
        $data['id_kuis'] = $this->session->flashdata('kuis_id');
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_buat_soal_pg', $data);
        $this->loadtemplateslast();
    }

    public function proses_tambah_soal_pg()
    {
        $sl = $this->input->post('soal');
        $data = array();
        $this->setValidationRulesTambahSoalPG();
        if ($this->form_validation->run()) {
            foreach ($sl as $key => $val) {
                $data[] = array(
                    "user_id" => $_POST['user_id'][$key],
                    "kelas_id" => $_POST['kelas_id'][$key],
                    "kuis_id" => $_POST['kuis_id'][$key],
                    "soal" => $_POST['soal'][$key],
                    "a" => $_POST['opsiA'][$key],
                    "b" => $_POST['opsiB'][$key],
                    "c" => $_POST['opsiC'][$key],
                    "d" => $_POST['opsiD'][$key],
                    "kunci" => $_POST['kunci'][$key]
                );
            }
            $this->db->insert_batch('soal_pg', $data);

            redirect(site_url("teacher/kuis"));
        } else {
            redirect(site_url("teacher/buat_soal_pg"));
        }
    }

    public function buat_soal_isian()
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Buat Soal Isian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['jml_soal'] = $this->session->flashdata('jumlah_soal');
        $data['id_kuis'] = $this->session->flashdata('kuis_id');

        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_buat_soal_isian', $data);
        $this->loadtemplateslast();
    }
    public function proses_tambah_soal_isian()
    {
        $sl = $this->input->post('soal');
        $data = array();
        $this->setValidationRulesTambahSoalEssay();
        if ($this->form_validation->run()) {
            foreach ($sl as $key => $val) {
                $data[] = array(
                    "user_id" => $_POST['user_id'][$key],
                    "kelas_id" => $_POST['kelas_id'][$key],
                    "kuis_id" => $_POST['kuis_id'][$key],
                    "soal" => $_POST['soal'][$key]
                );
            }
            $this->db->insert_batch('soal_essay', $data);

            redirect(site_url("teacher/kuis"));
        } else {
            redirect(site_url("teacher/buat_soal_isian"));
        }
    }

    public function ubah_kuis($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Form Ubah Kuis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['soal_isian'] = $this->Soal_model->getSoalEssay();
        $data['soal_pg'] = $this->Soal_model->getSoalPG();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_ubah_info_kuis', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_kuis($id)
    {
        if ($this->Kuis_model->updateKuis($id)) {
            redirect(site_url("teacher/kuis"));
        } else {
            redirect(site_url("teacher/ubah_kuis/" . $id));
        }
    }

    public function ubah_soal_isian($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Form Ubah Soal Isian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['soal'] = $this->Soal_model->getSoalEssay();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_ubah_soal_kuis_isian', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_soal_isian($id)
    {
        $sl = $this->input->post('soal');
        $data = array();
        $this->setValidationRulesTambahSoalEssay();
        if ($this->form_validation->run()) {
            foreach ($sl as $key => $val) {
                $data[] = array(
                    "id" => $_POST['id'][$key],
                    "soal" => $_POST['soal'][$key]
                );
            }
            $this->db->update_batch('soal_essay', $data, 'id');
            redirect(site_url("teacher/ubah_kuis/" . $id));
        } else {
            redirect(site_url("teacher/ubah_soal_isian/" . $id));
        }
    }

    public function ubah_soal_pg($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Form Ubah Soal Pilihan Ganda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['soal'] = $this->Soal_model->getSoalPG();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/form_ubah_soal_kuis_pg', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_soal_pg($id)
    {
        $sl = $this->input->post('soal');
        $data = array();
        $this->setValidationRulesTambahSoalPG();
        if ($this->form_validation->run()) {
            foreach ($sl as $key => $val) {
                $data[] = array(
                    "id" => $_POST['id'][$key],
                    "soal" => $_POST['soal'][$key],
                    "a" => $_POST['opsiA'][$key],
                    "b" => $_POST['opsiB'][$key],
                    "c" => $_POST['opsiC'][$key],
                    "d" => $_POST['opsiD'][$key],
                    "kunci" => $_POST['kunci'][$key]
                );
            }
            $this->db->update_batch('soal_pg', $data, 'id');
            redirect(site_url("teacher/ubah_kuis/" . $id));
        } else {
            redirect(site_url("teacher/ubah_soal_pg/" . $id));
        }
    }

    public function hapus_kuis_essay($id)
    {
        $this->Kuis_model->deleteKuis($id);
        $this->Soal_model->deleteSoalEssay($id);
        redirect(site_url("teacher/kuis"));
    }

    public function hapus_kuis_pg($id)
    {
        $this->Kuis_model->deleteKuis($id);
        $this->Soal_model->deleteSoalPG($id);
        redirect(site_url("teacher/kuis"));
    }

    public function buka_daftar_kuis_siswa($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Tabel Nilai Kuis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['status'] = $this->Status_kuis_model->getStatusKuisByKuis($id);
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisByKuis($id)->result_array();
        $this->session->set_flashdata('id_kuis_detail_essay', $id);
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_daftar_kuis', $data);
        $this->loadtemplateslast();
    }

    public function daftar_kuis_siswa_detail_pg($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Buka Kuis Pilihan Ganda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['tema'] = $this->Tema_model->getTema();
        $data['jawaban'] = $this->Jawaban_model->getJawabanByNilai($id);
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisById($id)->row();
        $data['soal'] = $this->Soal_model->getSoalPG();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_kuis_pg', $data);
        $this->loadtemplateslast();
    }

    public function daftar_kuis_siswa_detail_essay($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Buka Kuis Isian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['tema'] = $this->Tema_model->getTema();
        $data['jawaban'] = $this->Jawaban_model->getJawabanByNilai($id);
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisById($id)->row();
        $data['soal'] = $this->Soal_model->getSoalEssay();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_kuis_essay', $data);
        $this->loadtemplateslast();
    }

    public function proses_nilai_kuis_oleh_guru($id)
    {
        $data = $this->session->flashdata('id_kuis_detail_essay');
        if ($this->Nilai_kuis_model->updateNilai($id)) {
            redirect(site_url("teacher/buka_daftar_kuis_siswa/" . $data));
        } else {
            redirect(site_url("teacher/daftar_kuis_siswa_detail_essay/" . $id));
        }
    }

    public function buka_tabel_nilai_kuis()
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Tabel Nilai Kuis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuis();
        $this->loadtemplatesfirst($data);
        $this->load->view('teacher/halaman_tabel_nilai_kuis', $data);
        $this->loadtemplateslast();
    }

    #KuisEnd

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

    protected function setValidationRulesTambahKuis()
    {
        $this->form_validation->set_rules('judul_kuis', 'Judul Kuis', 'required');


        $this->form_validation->set_message('required', 'Kosong. Inputkan %s!');
    }
    protected function setValidationRulesTambahSoalEssay()
    {
        $this->form_validation->set_rules('soal[]', 'Soal', 'required');


        $this->form_validation->set_message('required', 'Kosong. Inputkan %s!');
    }
    protected function setValidationRulesTambahSoalPG()
    {
        $this->form_validation->set_rules('soal[]', 'Soal', 'required');
        $this->form_validation->set_rules('opsiA[]', 'Opsi A', 'required');
        $this->form_validation->set_rules('opsiB[]', 'Opsi B', 'required');
        $this->form_validation->set_rules('opsiC[]', 'Opsi C', 'required');
        $this->form_validation->set_rules('opsiD[]', 'Opsi D', 'required');


        $this->form_validation->set_message('required', 'Kosong. Inputkan %s!');
    }

    protected function setValidationRulesTambahpenugasan()
    {
        $this->form_validation->set_rules('judul_penugasan', 'Judul Penugasan', 'required');


        $this->form_validation->set_message('required', 'Kosong. Inputkan %s!');
    }
}
