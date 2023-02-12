<?php
include_once('Database.php');

class Buku extends Database {

    public function all(){
        $sql = "SELECT buku.id , buku.judul, buku.pengarang, kategori.nama as kategori, penerbit.nama as penerbit, buku.tahun_terbit, buku.isbn, buku.jbb, buku.jbr, buku.jbb + buku.jbr as jumlah FROM buku, kategori, penerbit WHERE buku.penerbit = penerbit.nama  AND buku.kategori =  kategori.nama";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);

    }


}

?>