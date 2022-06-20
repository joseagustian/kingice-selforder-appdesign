<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    include 'connection.php';
    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];

        if ($keyword==""){

        }else{
            $getDataMenu = "SELECT * FROM tabel_menu WHERE nama_menu LIKE '$keyword%' ORDER BY nama_menu ASC";
            $result = $conn-> query($getDataMenu);
            if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo '<div class="card card-search disable-select list-group-item">';
                echo '<div class="card-body">';
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="id_menu" value="'.$row["id_menu"].'"></input>';
                echo '<h6 class="card-title">'.$row["nama_menu"].'</h6>';
                echo '<h6 class="card-subtitle text-muted">'.' Rp. '.$row["harga_menu"].'</h6>';
                echo '<div class="position-absolute top-50 end-0 translate-middle-y card-footer bg-transparent" style="border: 0; width: 5rem; height: 5rem;">';
                echo '<button class="btn btn-dark btn-sm btn-add mt-3" type="submit"><i class="fas fa-plus fa-sm"></i></button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                }
            }
        }
    } else {
        echo '404 Not Found';
    }


?>