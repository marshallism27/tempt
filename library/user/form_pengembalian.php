<?php
session_start();
include_once("../class/Peminjaman.php");
include_once("../class/User.php");
include_once("../class/Buku.php");

$buku = new Buku();
$data_buku = $buku->all();

$user = new User();
$data_user = $user->find($_SESSION["id"]);


if(isset($_POST["update"])){
    $data = [
        "id" => $_POST["id"],
        "t_kembali" => $_POST["t_kembali"],
        "k_buku_k" => $_POST["k_buku_k"],
        "denda" => $_POST["denda"]
    ];
    
    $pengembalian = new Peminjaman();
    $update = $pengembalian->update($_POST["id"], $data);
    echo $update;

    // return var_dump($_POST); 

    header('location: pengembalian.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/me.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
   </head>
<body>
<?php include('menubar.php') ?>
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu' ></i>
    <span class="text"> Selamat Datang <?= $data_user["fullname"] ?> di Perpustakaan</span>
  </div>
<form action="" method ="POST" enctype = "multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
    <div class="col-md-5 border-right">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Form Pengembalian</h4>
            </div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12">
                    <label class="labels">Nama Anggota</label>
                    <input type="text" name ="fullname" class="form-control" disabled value="<?= $data_user["fullname"] ?>" >
                    <input type="hidden" name ="id_user" class="form-control" value="<?= $data_user["id"] ?>" >
                </div>
                <div class="col-md-12">
                    <label class="labels">Buku</label>
                    <select class="form-select" name="id_buku" id="">
                        <option value="" disabled selected></option>
                        <?php foreach($data_buku as $b){
                            ?>
                            <option value="<?= $b["id"] ?>" 
                    <?php if(isset($_GET["id_buku"])) { 
                        if($_GET["id_buku"] == $b["id"]) { 
                            echo "selected"; 
                        } else { echo ""; 
                        } 
                        } else { echo ""; } ?>><?= $b["judul"] ?> | <?= $b ["pengarang"] ? 'selected' : ' ' ?>
                    </option>
                            <?php
                        } ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="labels">Kondisi Buku</label>
                    <select class = "form-select" name="k_buku_k" id="">
                        <option value="" disabled selected> -- Pilih Kondisi --</option>
                        <option value="BAIK">Baik</option>
                        <option value="RUSAK">Rusak</option>
                    </select>
                </div>
            </div>
            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="update" name ="update">Submit</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</form>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="../css/script.js"></script>
</body>
</html>