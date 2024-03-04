<?php 

    include_once 'lib/database.php';

    class register {
        public $db;
        function __construct() {
            $this->db = new Database();
        }

        public function addRegister($data, $file) {
            $nama = $data['nama'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];

            $permited = array ('jpg', 'jpeg', 'png', 'gif');
            $file_nama = $file['photo'] ['name'];
            $file_size = $file['photo'] ['size'];
            $file_temp = $file['photo'] ['tmp_name'];

            $div = explode('.', $file_nama);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if (empty ($nama) || empty ($email) || empty ($phone) || empty ($address) || empty ($file_nama)) {
                $msg = 'Form Tidak Boleh Kosong';
                return $msg;
            } elseif (in_array($file_ext, $permited) == false ) {
                $msg = 'Kamu Hanya Bisa Upload' . implode(', ', $permited);
                return $msg;
            } elseif ($file_size > 1048567) {
                $msg = 'File Terlalu Besar, Tidak Boleh Lebih 1MB';
                return $msg;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "INSERT INTO `tbl_register`(`nama`, `email`, `phone`, `photo`, `address`) VALUES (' $nama', '$email', '$phone', '$uploaded_image', '$address')";

                $result = $this->db->insert($query);

                if ($result) {
                    $msg = 'Registrasi Berhasil';
                    return $msg;
                } else {
                    $msg = 'Registrasi Gagal';
                    return $msg;
                }
            }
        }

        public function allStudent() {
            $query = "SELECT * FROM tbl_register ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getStudentById($id) {
            $query = "SELECT * FROM tbl_register WHERE id = $id";
            $result = $this->db->select($query);
            return $result;
        }

        public function editStudent($data, $file, $id) {
            $nama = $data['nama'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];
        
            $permited = array ('jpg', 'jpeg', 'png', 'gif');
            $file_nama = $file['photo']['name'];
            $file_size = $file['photo']['size'];
            $file_temp = $file['photo']['tmp_name'];
        
            if (empty($nama) || empty($email) || empty($phone) || empty($address)) {
                $msg = 'Form Tidak Boleh Kosong';
                return $msg;
            }
        
            if (!empty($file_nama)) {
                $div = explode('.', $file_nama);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                $uploaded_image = "upload/" . $unique_image;
        
                if (in_array($file_ext, $permited) == false) {
                    $msg = 'Kamu Hanya Bisa Upload' . implode(', ', $permited);
                    return $msg;
                } elseif ($file_size > 1048567) {
                    $msg = 'File Terlalu Besar, Tidak Boleh Lebih 1MB';
                    return $msg;
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                }
            } else {
                $uploaded_image = ''; // set $uploaded_image ke string kosong jika tidak ada file yang diunggah
            }
        
            // Query update
            $query = "UPDATE tbl_register SET nama = '$nama', email = '$email', phone = '$phone', photo = '$uploaded_image', address = '$address' WHERE id = '$id'";
            
            // Perhatikan bahwa kita menggunakan fungsi update() atau executeQuery() (sesuai dengan implementasi Anda) di bawah ini.
            $result = $this->db->update($query);
        
            if ($result) {
                $msg = 'Edit Data Berhasil';
                return $msg;
            } else {
                $msg = 'Edit Data Gagal';
                return $msg;
            }
        }
        
    }
?>