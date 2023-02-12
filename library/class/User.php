<?php
include_once('Database.php');

class User extends Database{

    public function all(){
        $sql = "SELECT * FROM user";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM user WHERE id='$id'";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function getAnggota(){
        $sql = "SELECT * FROM user WHERE role = 'user' AND deleted_at is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdmin(){
        $sql = "SELECT * FROM user WHERE role = 'admin' AND deleted_at IS NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $kode = $data["kode"];
        $nis = $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas= $data["kelas"];
        $alamat = $data["alamat"];
        $verif = $data["verif"];
        $role = $data["role"];
        $join_date = date('Y-m-d H:i:s');
        $foto = $_FILES["foto"];

        if($foto["error"] !==4 ){$target_file = '../images' .date("Ymdhis") .basename ($foto["name"]);
            move_uploaded_file($foto["tmp_name"], $target_file);
    
            $sql = "INSERT INTO user (kode, nis, fullname, username, password, kelas, alamat, verif, role, foto, join_date) VALUES ('$kode', '$nis', '$fullname', '$username', '$password', '$kelas', '$alamat', '$verif', '$role', '$join_date',  '$target_file')";
            }else{
                $sql = "INSERT INTO user (kode, nis, fullname, username, password, kelas, alamat, verif, role, join_date) VALUES ('$kode', '$nis', '$fullname', '$username', '$password', '$kelas', '$alamat', '$verif', '$role', '$join_date')";
            }
    
            if($this->db->query($sql) === TRUE){
                echo "Berhasil";
            }else{
                echo "Gagal";
            }
        }
    

    public function update($id, $data){
        $id = $data["id"];
        $kode = $data["kode"];
        $nis = $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas= $data["kelas"];
        $alamat = $data["alamat"];
        $verif = $data["verif"];
        $foto = $_FILES["foto"];

        if($foto["error"] !==4 ){$target_file = '../images' .date("Ymdhis") .basename ($foto["name"]);
            move_uploaded_file($foto["tmp_name"], $target_file);
    
            $sql = "UPDATE user SET kode = '$kode', nis = '$nis', fullname = '$fullname', username = '$username', password = '$password', kelas = '$kelas', alamat = '$alamat', verif = '$verif', foto = '$target_file' WHERE id='$id'";
            }else{
                $sql = "UPDATE user SET  kode = '$kode', nis = '$nis', fullname = '$fullname', username = '$username', password = '$password', kelas = '$kelas', alamat = '$alamat', verif = '$verif' WHERE id='$id'";
            }
    
            if($this->db->query($sql) === TRUE){
                echo "Berhasil";
            }else{
                echo "Gagal";
            }
        }

        public function delete($id){
            $date = date('Y-m-d H:i:s');
            $sql = "UPDATE user SET deleted_at = '$date' WHERE id='$id'";

            if($this->db->query($sql) === TRUE){
                echo "<script> alert('Berhasil Dihapus') </script>";
            }else{
                echo "<script> alert('Gagal dihapus')</script>";
            }
        }
}







?>