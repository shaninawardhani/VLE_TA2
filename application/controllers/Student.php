<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
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
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserSiswa();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $data['tema'] = $this->Tema_model->getTema();
        $data['statusT'] = $this->Status_tugas_model->getStatusTugas();
        $data['statusK'] = $this->Status_kuis_model->getStatusKuis();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuis();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/index', $data);
        $this->loadtemplateslast();
    }

    public function ubah_profile($id)
    {
        $data['title'] = '';
        $data['subtitle'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->User_model->getUserGuru();
        $data['akun'] = $this->User_model->getUserById($id)->row();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/ubah_profile', $data);
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
                redirect(site_url("student"));
            } else {
                redirect(site_url("student/ubah_profile/$id"));
            }
        } else {
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("student/ubah_profile/$id"));
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = base_url("assets/img/profile/") . $upload_data['file_name'];
                if ($this->User_model->updateAkun($id, $data)) {
                    $this->session->set_flashdata('success', 'Image berhasil diunggah');
                    redirect(site_url("student"));
                } else {
                    redirect(site_url("student/ubah_profile/$id"));
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
        $this->load->view('student/ubah_password', $data);
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
            $this->session->set_flashdata('ubah_password_siswa', '<div class="alert alert-danger" role="alert">Password gagal diganti !! </div>');
            redirect(site_url("student/ubah_password/$id"));
        } else {
            $this->User_model->updatePassword($id);
            $this->session->set_flashdata('ubah_password_siswa', '<div class="alert alert-primary" role="alert">Password berhasil diganti!! </div>');
            redirect(site_url("student"));
        }
    }


    #MateriBegin

    public function materi()
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = 'Daftar Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->Materi_model->getAllMateri();
        $data['tema'] = $this->Tema_model->getTema();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/materi', $data);
        $this->loadtemplateslast();
    }

    public function buka_materi($id)
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = 'Buka Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->Materi_model->getMateriById($id)->row_array();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/halaman_buka_materi', $data);
        $this->loadtemplateslast();
    }

    #MateriEnd

    #TugasBegin

    public function tugas()
    {
        $data['title'] = 'Tugas';
        $data['subtitle'] = 'Daftar Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getAllPenugasan();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $data['tema'] = $this->Tema_model->getTema();
        $data['status'] = $this->Status_tugas_model->getStatusTugas();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/tugas', $data);
        $this->loadtemplateslast();
    }

    public function form_unggah_tugas($id)
    {
        $data['title'] = 'Tugas';
        $data['subtitle'] = 'Form Unggah Tugas';
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getPenugasanById($id)->row();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $data['tema'] = $this->Tema_model->getTema();
        $data['status'] = $this->Status_tugas_model->getStatusTugasByPenugasan($id)->result_array();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/form_unggah_tugas', $data);
        $this->loadtemplateslast();
    }

    public function proses_unggah_tugas($id)
    {
        $data = array(
            "user_id" => $this->input->post("user_id"),
            "tema_id" => $this->input->post("tema_id"),
            "kelas_id" => $this->input->post("kelas_id"),
            "penugasan_id" => $this->input->post("penugasan_id"),
            "nilai" => $this->input->post("nilai")
        );

        $idPenugasan = $this->input->post("penugasan_id_sendiri");
        $data_status = array(
            "status" => 1
        );
        $this->db->set($data_status);
        $this->db->where("id", $idPenugasan);
        $this->db->update("status_tugas");
        #config file upload
        $config['upload_path'] = './assets/file/tugas';
        $config['allowed_types'] = 'jpg|png|jpeg|mp4|docx|pptx|ppt|mkv|doc|pdf|zip|rar|mp3|aac';
        $config['max_size'] = 100000;

        $this->load->library('upload', $config);
        if (empty($_FILES['url']['name'])) {
            //
            if ($this->Tugas_model->insertTugas($data)) {
                $this->session->set_flashdata('success', 'Tugas berhasil diunggah');

                redirect(site_url("student/tugas"));
            } else {
                redirect(site_url("student/unggah_tugas/$id"));
            }
        } else {
            if (!$this->upload->do_upload('url')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("student/tugas"));
            } else {
                $upload_data = $this->upload->data();
                $data['url'] = base_url("assets/file/tugas/") . $upload_data['file_name'];
                if ($this->Tugas_model->insertTugas($data)) {
                    $this->session->set_flashdata('success', 'Tugas berhasil diunggah');
                    redirect(site_url("student/tugas"));
                } else {
                    redirect(site_url("student/unggah_tugas/$id"));
                }
            }
        }
    }

    public function detail_tugas($id)
    {
        $data['title'] = 'Tugas';
        $data['subtitle'] = 'Detail Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getPenugasanById($id)->row();
        $data['tugas'] = $this->Tugas_model->getTugas();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/halaman_buka_tugas', $data);
        $this->loadtemplateslast();
    }

    public function ubah_tugas($id)
    {
        $data['title'] = 'Tugas';
        $data['subtitle'] = 'Form Ubah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penugasan'] = $this->Penugasan_model->getPenugasanById($id)->row();
        $data['tugas'] = $this->Tugas_model->getTugasByPenugasan($id)->result_array();
        $data['status'] = $this->Status_tugas_model->getStatusTugas();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/halaman_ubah_tugas', $data);
        $this->loadtemplateslast();
    }

    public function proses_ubah_tugas($id)
    {
        $data = array(
            'nilai' => $this->input->post('nilai')
        );
        $idTugas = $this->input->post("tugas_id_sendiri");
        $idPenugasan = $this->input->post("status_id_sendiri");
        $data_status = array(
            "status" => 1
        );
        $this->db->set($data_status);
        $this->db->where("id", $idPenugasan);
        $this->db->update("status_tugas");
        #config file upload
        $config['upload_path'] = './assets/file/tugas';
        $config['allowed_types'] = 'jpg|png|jpeg|mp4|docx|pptx|ppt|mkv|doc|pdf|zip|rar|mp3|aac';
        $config['max_size'] = 100000;

        $this->load->library('upload', $config);
        if (empty($_FILES['url']['name'])) {
            //
            if ($this->Tugas_model->updateTugas($idTugas, $data)) {
                $this->session->set_flashdata('success', 'Tugas berhasil diubah');

                redirect(site_url("student/tugas"));
            } else {
                redirect(site_url("student/ubah_tugas/$id"));
            }
        } else {
            if (!$this->upload->do_upload('url')) {
                $this->session->set_flashdata('error', 'File tidak sesuai. Masukkan file dengan format yang diterima');
                redirect(site_url("student/tugas"));
            } else {
                $upload_data = $this->upload->data();
                $data['url'] = base_url("assets/file/tugas/") . $upload_data['file_name'];
                if ($this->Tugas_model->updateTugas($idTugas, $data)) {
                    $this->session->set_flashdata('success', 'Tugas berhasil diunggah');
                    redirect(site_url("student/tugas"));
                } else {
                    redirect(site_url("student/ubah_tugas/$id"));
                }
            }
        }
    }

    #TugasEnd

    #KuisBegin
    public function kuis()
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Daftar Kuis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getAllKuis();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuis();
        $this->loadtemplatesfirst($data);
        $this->load->view('student/kuis', $data);
        $this->loadtemplateslast();
    }

    public function jawab_detail_kuis_pg($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Jawab Kuis Pilihan Ganda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisByKuis($id)->result_array();
        $data['soal'] = $this->Soal_model->getSoalPGByKuis($id);
        $this->loadtemplatesfirst($data);
        $this->load->view('student/form_jawab_kuis_pg', $data);
        $this->loadtemplateslast();
    }

    public function proses_jawab_kuis_pg($id)
    {
        $sl = $this->input->post('soal_id');
        $nilai_id = $this->input->post('nilai_id_sendiri');
        $data = array();
        $jumlah = 0;
        foreach ($sl as $key => $val) {
            $jumlah++;
        }
        $this->setValidationRulesJawabKuis($jumlah);

        if ($this->form_validation->run()) {
            $i = 1;
            foreach ($sl as $key => $val) {
                $data[] = array(
                    "user_id_siswa" => $_POST['user_id_siswa'][$key],
                    "kelas_id" => $_POST['kelas_id'][$key],
                    "kuis_id" => $_POST['kuis_id'][$key],
                    "soal_id" => $_POST['soal_id'][$key],
                    "nilai_id" => $_POST['nilai_id'][$key],
                    "jawaban" => $_POST['jawaban' . $i]
                );
                $i++;
            }
            $this->db->insert_batch('jawaban', $data);
            $this->session->set_flashdata('nilai_id', $nilai_id);
            redirect(site_url("student/proses_nilai/" . $id));
        } else {
            redirect(site_url("student/jawab_detail_kuis_pg/" . $id));
        }
    }

    public function proses_nilai($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['nl_id'] = $this->session->flashdata('nilai_id');
        $data['jawaban'] = $this->Jawaban_model->getJawabanByKuis($id);
        $data['soal'] = $this->Soal_model->getSoalPGByKuis($id);
        $data['status'] = $this->Status_kuis_model->getStatusKuisByKuis($id);
        $this->load->view('student/proses_nilai_pg', $data);
        $this->session->set_flashdata('id_kuis', $id);
    }

    public function proses_nilai_kuis($id)
    {
        $id_kuis = $this->session->flashdata('id_kuis');

        $id_status = $this->input->post("id_status");

        if ($this->Nilai_kuis_model->updateNilai($id)) {
            if ($this->Status_kuis_model->updateStatus($id_status)) {
                redirect(site_url("student/kuis"));
            } else {
                echo "tidak dapat update";
            }
        } else {
            redirect(site_url("student/proses_nilai/" . $id_kuis));
        }
    }

    public function buka_detail_kuis_pg($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Buka Kuis Pilihan Ganda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['jawaban'] = $this->Jawaban_model->getJawabanByKuis($id);
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisByKuis($id)->result_array();
        $data['soal'] = $this->Soal_model->getSoalPGByKuis($id);
        $this->loadtemplatesfirst($data);
        $this->load->view('student/halaman_kuis_pg', $data);
        $this->loadtemplateslast();
    }

    public function jawab_detail_kuis_essay($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Jawab Kuis Isian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisByKuis($id)->result_array();
        $data['soal'] = $this->Soal_model->getSoalEssayByKuis($id);
        $this->loadtemplatesfirst($data);
        $this->load->view('student/form_jawab_kuis_essay', $data);
        $this->loadtemplateslast();
    }

    public function proses_jawab_kuis_essay($id)
    {
        $sl = $this->input->post('soal_id');
        $nilai_id = $this->input->post('nilai_id_sendiri');
        $data = array();
        $jumlah = 0;
        foreach ($sl as $key => $val) {
            $jumlah++;
        }
        $this->setValidationRulesJawabKuisEssay($jumlah);

        if ($this->form_validation->run()) {
            $i = 1;
            foreach ($sl as $key => $val) {
                $data[] = array(
                    "user_id_siswa" => $_POST['user_id_siswa'][$key],
                    "kelas_id" => $_POST['kelas_id'][$key],
                    "kuis_id" => $_POST['kuis_id'][$key],
                    "soal_id" => $_POST['soal_id'][$key],
                    "nilai_id" => $_POST['nilai_id'][$key],
                    "jawaban" => $_POST['jawaban' . $i]
                );
                $i++;
            }
            $this->db->insert_batch('jawaban', $data);
            $this->session->set_flashdata('nilai_id', $nilai_id);
            redirect(site_url("student/proses_nilai_essay/" . $id));
        } else {
            redirect(site_url("student/jawab_detail_kuis_essay/" . $id));
        }
    }

    public function proses_nilai_essay($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['nl_id'] = $this->session->flashdata('nilai_id');
        $data['status'] = $this->Status_kuis_model->getStatusKuisByKuis($id);
        $this->load->view('student/proses_nilai_essay', $data);
        $this->session->set_flashdata('id_kuis', $id);
    }

    public function proses_nilai_kuis_essay($id)
    {
        $id_kuis = $this->session->flashdata('id_kuis');

        $id_status = $this->input->post("id_status");

        if ($this->Status_kuis_model->updateStatus($id_status)) {
            redirect(site_url("student/kuis"));
        } else {
            echo "tidak dapat update";
            redirect(site_url("student/proses_nilai_essay/" . $id_kuis));
        }
    }

    public function buka_detail_kuis_essay($id)
    {
        $data['title'] = 'Kuis';
        $data['subtitle'] = 'Buka Kuis Isian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->Kuis_model->getKuisById($id)->row();
        $data['tema'] = $this->Tema_model->getTema();
        $data['jawaban'] = $this->Jawaban_model->getJawabanByKuis($id);
        $data['kelas'] = $this->Kelas_model->getKelasASC();
        $data['status'] = $this->Status_kuis_model->getStatusKuis();
        $data['nilai'] = $this->Nilai_kuis_model->getNilaiKuisByKuis($id)->result_array();
        $data['soal'] = $this->Soal_model->getSoalEssayByKuis($id);
        $this->loadtemplatesfirst($data);
        $this->load->view('student/halaman_kuis_essay', $data);
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

    public function setValidationRulesJawabKuis($jumlah)
    {
        for ($i = 1; $i <= $jumlah; $i++)
            $this->form_validation->set_rules('jawaban' . $i, 'jawaban', 'required');


        $this->form_validation->set_message('required', 'Kosong. Inputkan %s!');
    }

    public function setValidationRulesJawabKuisEssay($jumlah)
    {
        for ($i = 1; $i <= $jumlah; $i++)
            $this->form_validation->set_rules('jawaban' . $i, 'jawaban', 'required');


        $this->form_validation->set_message('required', 'Kosong. Inputkan %s!');
    }
}
