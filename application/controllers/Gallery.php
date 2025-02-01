<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));  // Memuat helper untuk form dan URL (untuk upload dan redirect)
        $this->load->library('upload');             // Memuat library Upload untuk menangani proses upload file
        $this->load->model('Gallery_model');         // Memuat model upload_model untuk berinteraksi dengan database
    }

    // Menampilkan semua data upload
    public function admin(){
        $data['uploads'] = $this->Gallery_model->get_uploads();  // Mengambil data upload dari model
        $this->load->view('admin/gallery', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    }
    public function user(){
        $data['uploads'] = $this->Gallery_model->get_uploads();  // Mengambil data upload dari model
        $this->load->view('user/gallery', $data);                // Memuat tampilan 'index' dan mengirim data upload ke view
    }

    // Membuat upload baru
    public function create(){
        if ($this->input->post('Submit')){  // Mengecek apakah form telah disubmit
            $config['upload_path'] = './assets/';  // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  // Jenis file yang diperbolehkan (gambar)
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate secara otomatis dengan angka acak
            $this->upload->initialize($config);  // Menginisialisasi library upload dengan konfigurasi di atas

            if ($this->upload->do_upload('gambar')){  // Melakukan upload jika form disubmit
                $upload_data = $this->upload->data();  // Mengambil data file setelah upload berhasil
                $data = array(
                    'gambar' => $upload_data['file_name'],  // Menyimpan nama file yang diupload
                    'deskripsi' => $this->input->post('deskripsi'),
                        'kategori'  => $this->input->post('kategori') // Ambil dari input form
                );
                $this->Gallery_model->insert_upload($data);  // Menyimpan data upload ke database
                $this->session->set_flashdata('success', 'Upload berhasil!');
                redirect('gallery/admin');  // Redirect ke halaman 'upload' setelah sukses
            } else {
                $error = array('error' => $this->upload->display_errors());  // Menangkap error jika upload gagal
                $this->session->set_flashdata('error', $error['error']);
                $this->load->view('admin/createG', $error);  // Memuat tampilan 'create' dengan pesan error
            }
        } else {
            $this->load->view('admin/createG');  // Memuat tampilan 'create' jika form belum disubmit
        }
    }

    // Mengedit upload yang sudah ada
    // Mengedit upload yang sudah ada
public function edit($id) {
    if ($this->input->post('submit')) { // Mengecek apakah form telah disubmit
        $data = array(
            'deskripsi' => $this->input->post('deskripsi'),
            'kategori'  => $this->input->post('kategori') // Ambil dari input form
        );

        // Ambil data berdasarkan ID
        $upload = $this->Gallery_model->get_upload_by_id($id);
        $old_image = isset($upload->gambar) ? $upload->gambar : '';  // Periksa apakah gambar ada

        // Mengecek apakah ada file gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/'; // Direktori tempat file akan disimpan
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Jenis file yang diperbolehkan
            $config['file_name'] = 'upload_' . rand(1, 1000); // Nama file di-generate otomatis
            $this->upload->initialize($config); // Inisialisasi library upload

            if ($this->upload->do_upload('gambar')) { // Jika upload berhasil
                $upload_data = $this->upload->data(); // Mengambil data file yang diunggah
                $data['gambar'] = $upload_data['file_name']; // Tambahkan nama file ke array data

                // Jika gambar lama ada, hapus gambar lama yang sudah tidak digunakan
                if (!empty($old_image) && file_exists('./assets/' . $old_image)) {
                    unlink('./assets/' . $old_image); // Hapus gambar lama
                }
            } else {
                // Jika upload gagal, set pesan error dan redirect kembali ke halaman edit
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('gallery/edit/' . $id);
            }
        } else {
            // Jika tidak ada gambar baru yang diunggah, pertahankan gambar lama
            $data['gambar'] = $old_image;
        }

        // Memperbarui data di database
        $this->Gallery_model->update_upload($id, $data);
        $this->session->set_flashdata('success', 'Update berhasil!');
        redirect('gallery/admin'); // Redirect ke halaman admin setelah sukses
    } else {
        // Ambil data berdasarkan ID
        $data['upload'] = $this->Gallery_model->get_upload_by_id($id);

        // Jika data tidak ditemukan, tampilkan halaman 404
        if (empty($data['upload'])) {
            show_404();
        }

        // Memuat tampilan edit dengan data yang ada
        $this->load->view('admin/editG', $data);
    }
}

    // Menghapus upload
    public function delete($id){
        $this->Gallery_model->delete_upload($id);  // Menghapus data upload dari database
        $this->session->set_flashdata('success', 'Hapus berhasil!');
        redirect('gallery/admin');  // Redirect ke halaman 'upload' setelah penghapusan
    }
}
?>
