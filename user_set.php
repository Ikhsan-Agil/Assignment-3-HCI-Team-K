<?php
    date_default_timezone_set('Asia/Jakarta');
    
    if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    } else {
    $id_user = rand(1000000000,9999999999);
    
    $sql = "SELECT id_user FROM pengguna WHERE id_user = '$id_user'";
    $statement = $conn->query($sql);
    $data_pengguna = $statement->fetch_all(MYSQLI_ASSOC);

    if (empty($data_pengguna)) {
        $waktu_dibuat = date("d.m.y H:i:s");
        $sql = "INSERT INTO pengguna VALUES ('$id_user', '$waktu_dibuat')";
        $statement = $conn->query($sql);
    }
    
    $_SESSION['id_user'] = $id_user;
    }
?>
