<?php
include 'connect.php';

$idb = $_GET['idb'];

$query = mysqli_query($connect, "DELETE * FROM stok WHERE idb='$idb'")
or die(mysqli_error($koneksi));

if($query){
    header("location:http://localhost/Petshop/index.php");
}else{
    echo "Gagal Menghapus";
}
?>