<?php

//membuat koneksi ke database
$conn = mysqli_connect ("localhost","root","","gudang");

//menambah data barang
if(isset($_POST['addbarang'])){
    $idbarang = $_POST['idbarang'];
    $namabarang = $_POST['namabarang'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];

    $addtotable = mysqli_query($conn,"INSERT into stok (namabarang, jenis, stok) values ('$namabarang','$jenis','$stok')");
    if($addtotable){
        header('location:http://localhost/Petshop/index.php');
    }else{
        echo "Gagal";
        header('location:http://localhost/Petshop/index.php');
    }
}

//menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];

    $cekstok = mysqli_query($conn,"SELECT * from stok where idbarang='$barang'");
    $ambil = mysqli_fetch_array($cekstok);

    $stoksekarang = $ambil['stok'];
    $total = $stoksekarang+$jumlah;

    $addtomasuk = mysqli_query($conn, "INSERT into barangmasuk (idbarang, jumlah) values ('$barang','$jumlah')");
    $updatestok = mysqli_query($conn, "UPDATE stok set stok='$total' where idbarang='$barang'");
    if($addtomasuk&&$updatestok){
        header('location:http://localhost/Petshop/masuk.php');
    }else{
        echo "Gagal";
        header('location:http://localhost/Petshop/masuk.php');
    }
}

//barang keluar
if(isset($_POST['barangkeluar'])){
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];

    $cekstok = mysqli_query($conn,"SELECT * from stok where idbarang='$barang'");
    $ambil = mysqli_fetch_array($cekstok);

    $stoksekarang = $ambil['stok'];
    $total = $stoksekarang-$jumlah;

    $addtomasuk = mysqli_query($conn, "INSERT into barangkeluar (idbarang, jumlah) values ('$barang','$jumlah')");
    $updatestok = mysqli_query($conn, "UPDATE stok set stok='$total' where idbarang='$barang'");
    if($addtomasuk&&$updatestok){
        header('location:http://localhost/Petshop/keluar.php');
    }else{
        echo "Gagal";
        header('location:http://localhost/Petshop/keluar.php');
    }
}

//update barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $jenis = $_POST['jenis'];

    $update = mysqli_query ($conn,"UPDATE stok set namabarang='$namabarang', jenis='$jenis' where idbarang='$idb'");
    if($update){
        header('location:http://localhost/Petshop/index.php');
    }else{
        echo "Gagal";
        header('location:http://localhost/Petshop/index.php');
    }
}

//delete barang
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $delete = mysqli_query($conn,"DELETE from stok where idbarang='$idb'");
    if($update){
        header('location:http://localhost/Petshop/index.php');
    }else{
        echo "Gagal";
        header('location:http://localhost/Petshop/index.php');
    }
}

// //update barang masuk
// if(isset($_POST['updatebarangmasuk'])){
//     $idb = $_POST['idb'];
//     $idm = $_POST['idm'];
//     $namabarang = $_POST['namabarang'];
//     $jenis = $_POST['jenis'];
//     $jumlah = $_POST['jumlah'];

//     $lihatstok = mysqli_query($conn,"SELECT * from stok where idbarang='$id'");
//     $tersedia = mysqli_fetch_array($lihatstok);
//     $sisastok = $tersedia['stok'];

//     $jml = mysqli_query($conn,"SELECT * from masuk where idmasuk='$idm'");
//     $tjml = mysqli_fetch_array($jml);
//     $sisajml = $tjml['jumlah']; 

//     if($jumlah>$jml){
//         $selisih = $jumlah + $jml;
//         $kurangi = $sisastok - $selisih; 
//         $kurang = mysqli_query($conn, "UPDATE stok set stok='$kurangi' where idbarang='$idb'");
//         $update = mysqli_query ($conn,"UPDATE masuk set jumlah='$jumlah', namabarang='$namabarang', jenis='$jenis' where idmasuk='$idm'");
//         if($kurang&&$update){
//             header('location:http://localhost/Prak7/masuk.php');
//         }else{
//             echo "Gagal";
//             header('location:http://localhost/Prak7/masuk.php');
//         }
//     }else{
//         $selisih = $jml - $jumlah;
//         $kurangi = $sisastok + $selisih; 
//         $kurang = mysqli_query($conn, "UPDATE stok set stok='$kurangi' where idbarang='$idb'");
//         $update = mysqli_query ($conn,"UPDATE masuk set jumlah='$jumlah', namabarang='$namabarang', jenis='$jenis' where idmasuk='$idm'");
//         if($kurang&&$update){
//             header('location:http://localhost/Prak7/masuk.php');
//         }else{
//             echo "Gagal";
//             header('location:http://localhost/Prak7/masuk.php');
//         }
//     }

// }

?>