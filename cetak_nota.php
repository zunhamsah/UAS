<?php
    if( empty( $_SESSION['id_user'] ) ){

        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    } else {
?>

<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body onload="window.print()">
    <div class="container">

<?php

    $id= $_REQUEST['id'];

    $sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id='$id'");

    list($id, $restoran, $makanan, $harga, $nama, $email, $no, $email) = mysqli_fetch_array($sql);
    $a = date('j F Y H:i:s');
    echo '
        <center>Data Pemesanan Makanan</center>
        <center>Per '.$a.'</center>
        <br>
        <table class="table table-bordered">
         <thead>
           <tr class="info">
            <th width="5%">No.</th>
                <th width="10%">Jenis Restoran</th>
                <th width="20%">Makanan</th>
                <th width="20%">Harga</th>
                <th width="10%">Nama Lengkap</th>
                <th width="10%">No HP</th>
                <th width="20%">Email</th>
            </tr>
         </thead>
         <tbody>

           <tr>
                <td>'.$id.'</td>
                <td>'.$restoran.'</td>
                <td>'.$makanan.'</td>
                <td>Rp'.number_format($harga).'</td>
                <td>'.$nama.'</td>
                <td>'.$no.'</td>
                <td>'.$email.'</td>
            </tr>

        </tbody>
    </table>
</body>
</html>';
}
?>
