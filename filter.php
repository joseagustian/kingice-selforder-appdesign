<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    
    include 'connection.php';
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        if ($category=="showall"){
            $getDataMenu = "SELECT * FROM tabel_menu ORDER BY nama_menu ASC";
        } elseif ($category=="recommendation"){
            
        } elseif ($category=="popular") {
            $getDataMenu = "SELECT tabel_menu.`id_menu`, tabel_menu.`nama_menu`, tabel_menu.`harga_menu`, SUM(tabel_itemsales.`qty_item`) AS total_pesanan FROM tabel_itemsales
            JOIN tabel_menu ON tabel_menu.`id_menu`=tabel_itemsales.`id_menu`
            GROUP BY tabel_menu.`id_menu` ORDER BY total_pesanan DESC";
        } elseif ($category=="lowestprice") {
            $getDataMenu = "SELECT * FROM tabel_menu ORDER BY harga_menu ASC";
        } elseif ($category=="highestprice") {
            $getDataMenu = "SELECT * FROM tabel_menu ORDER BY harga_menu DESC";
        }
    }  
        $result = $conn-> query($getDataMenu);
        if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 col-sm-4 col-6 col-xs-12 d-flex flex-wrap">';
            echo '<div class="card card-menu disable-select mt-3 mb-2">';
            echo '<div class="card-body">';
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="id_menu" value="'.$row["id_menu"].'"></input>';
            echo '<h5 class="card-title">'.$row["nama_menu"].'</h5>';
            echo '<h6 class="card-subtitle text-muted">'.' Rp. '.$row["harga_menu"].'</h6>';
            echo '<div class="position-absolute bottom-0 start-50 translate-middle-x card-footer" style="background-color: transparent; border: 0; width: 5rem; height: 5rem;">';
            echo '<button class="btn btn-link btn-add-cart mt-4" type="submit"><i class="fas fa-plus fa-lg"></i></button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    


?>