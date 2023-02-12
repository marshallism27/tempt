<?php
include_once("Database.php");

class Peminjaman extends Database{

    public function all(){
        $sql = "SELECT peminjaman.id as id_peminjaman , user.fullname as peminjam, buku.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda FROM user, buku, peminjaman WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda FROM user, buku, peminjaman WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND t_kembali IS NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPengembalian(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda FROM user, buku, peminjaman WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND t_kembali IS NOT NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT peminjaman.id as id_peminjaman, buku.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p FROM user, buku, peminjaman WHERE peminjaman.id_buku = buku.id  AND peminjaman.id_user = user.id AND peminjaman.id_user ='$id' AND t_kembali is NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findPengembalian($id){
        $sql= "SELECT buku.judul as buku, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda  FROM user, buku, peminjaman WHERE peminjaman.id_buku = buku.id  AND peminjaman.id_user = user.id AND  peminjaman.id_user ='$id' AND t_kembali is NOT NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $t_pinjam = $data["t_pinjam"];
        $k_buku_p = $data["k_buku_p"];

        $sql = "INSERT INTO peminjaman (id_user, id_buku, t_pinjam, k_buku_p) VALUES ('$id_user', '$id_buku', '$t_pinjam', '$k_buku_p')";

        if($this->db->query($sql)=== TRUE){
            echo "<script> alert('Peminjaman Berhasi, Selamat Membaca!')
            window.location.href='peminjaman.php'
                </script>";
        }else{
            echo "<script> alert('Gagal, Coba Lagi Nanti!')
            </script>";
        }
    }

    public function update($id, $data){
        $date = date('Y-m-d H:i:s');
        $denda = 20.000;
        $k_buku_k = $data["k_buku_k"];

        if($k_buku_k == "RUSAK"){
            $denda = "20.000";
        }else{
            if($k_buku_k == "BAIK"){
                $denda = "0";
            }
        }

        $sql = "UPDATE peminjaman SET t_kembali = '$date', k_buku_k = '$k_buku_k', denda = '$denda' WHERE id='$_GET[id_peminjaman]'";

        if($this->db->query($sql) === TRUE){
            
        }
    }

    public function denda($id, $data){
        
    }

    public function delete($id){
        $date = date('Y-m-d H:i:s');

        $sql = "DELETE FROM peminjaman WHERE id= '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil";
        }
        return "Gagal";
    }


}
?>