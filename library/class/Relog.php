<?php
include_once('Database.php');

class Relog extends Database {

    public function authLogin($data){
        $username = $data["username"];
        $password = $data["password"];

        $sql1 = "SELECT * FROM user WHERE username = '$username'";
        $cek_user = $this->db->query($sql1)->fetch_assoc();
        if ($cek_user) {
            if (password_verify($password, $cek_user['password'])) {
                // session_start();
                $_SESSION["id"] = $cek_user["id"];

                if($cek_user['verif'] == 'VERIFIED'){
                    if ($cek_user['role'] == 'admin') {
                        header("Location: admin/index.php ");
                    } elseif ($cek_user['role'] == 'user') {
                        header("Location: user/home.php");
                    } else {
                    }
                }elseif ($cek_user['verif'] == 'UNVERIFIED'){
                    echo "<script> swal('Tidak Bisa Login, Anda Belum Terverifikasi') 
                                    window.location.href='logout.php'
                                    </script>" ;
                }
        }
        }
    }

    public function register($fullname, $username, $password, $role, $verif){
        
        // return $username;
        $role = "user";
        $verif = "UNVERIFIED";
        $date = date('Y-m-d H:i:s');

        $sql = mysqli_query($this->db, "INSERT INTO user(fullname, username, password, role, join_date, verif) VALUES('$fullname', '$username', '$password', '$role', '$verif')");

        return $sql;
    }

    public function exist($username){
        $sql = mysqli_query($this->db, "SELECT * FROM user WHERE username = '$username'");

        if($sql->num_rows > 0){
            return true;
        } else {
            return false;
        }
    }
    // public function register($data){
    //     $fullname = $data["fullname"];
    //     $username = $data["username"];
    //     $password = $data["password"];
    //     $role = $data["role"];
    //     $verif = $data["verif"];

    //     $sql = "INSERT INTO user (fullname, username, password, role, verif) VALUES('$fullname', '$username', '$password', '$role', '$verif')";

    //     if($this->db->query($sql) === TRUE){
    //         echo "Berhasil Register, Silahkan Menunggu Verifikasi Dari Admin";
    //     }
    // }

    
}

   

    

//     public function login($username, $password, $role, $remember){
//         $sql = mysqli_query($this->db, "SELECT * FROM user WHERE username ='$username'");
//         $data_user = $sql->fetch_assoc();

//         if($password == $data_user['password']){

//             if($remember){
//                 setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
//                 setcookie('fullname', $data_user['fullname'], time() + (60 * 60 * 24 * 5), '/');
//             }
//             $_SESSION['username'] = $username;
//             $_SESSION['fullname'] = $data_user['fullname'];
//             $_SESSION['role'] = $data_user['role'];
//             $_SESSION['is_login'] = TRUE;
//             return TRUE;
//         }else{
//             if($data_user['role'] == 'admin'){
//                 header('location: admin/index.php');
//             }
//             elseif($data_user['role'] == 'user'){
//                 header('location: user/home.php');

//             }
//         }

//     }

//     public function relogin($username){
//         $sql = mysqli_query($this->db, "SELECT * FROM user WHERE username='$username'");
//         $data_user = $sql->fetch_assoc();
//         $_SESSION['username'] = $username;
//         $_SESSION['fullname'] = $data_user['fullname'];
//         $_SESSION['role'] = $data_user['role'];
//         $_SESSION['is_login'] = TRUE;
//     }


    
 
?>