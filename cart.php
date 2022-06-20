<?php

    include 'connection.php';

    if (isset($_POST['id_menu'], $_POST['addtocart'])){
        $id= $_POST['id_menu'];
        $buy = $_POST['addtocart'];

        $getDataMenu = "SELECT * FROM tabel_menu WHERE id_menu = '$id'";
        $result = $conn-> query($getDataMenu);

        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

        $index = -1;
        $cart = unserialize(serialize($_SESSION['cart']));

        for ($i=0; $i<count($cart); $i++){
            if ($cart[$i]['id'] == $id){
                $index = $i;
                $_SESSION['cart'][$i]['buy'] = $buy;
                break;
            }
        }

        if ($index == -1){
            $_SESSION['cart'][] = [
                'id' => $id,
                'nama_menu' => $row['nama_menu'],
                'harga_menu' => $row['harga_menu'],
                'buy' => $buy
            ];
        }

        if (!empty($_SESSION['cart'])){
            
        }
    }

?>