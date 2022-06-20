<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#212529">
    <link rel="icon" href="/kingice/assets/favicon.ico" type="image/ico" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/material-icons/iconfont/material-icons.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/fa-icons/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/fa-icons/css/solid.css">
    <script src="/kingice/assets/js/bootstrap.bundle.min.js"></script>
    <title>King Ice Cafe</title>
</head>

<body class="bg-dark">
<div class="container-fluid col-sm-10 col-25 col-lg-20 col-md-15 mx-auto">
        
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <div class="d-flex col-8">
            <div class="d-flex flex-wrap ms-2">
                <img src="/kingice/assets/logo.png" alt="King Ice Cafe" style="width: 25%;">
                <div class="col-8 mt-auto ms-3">
                    <p class="logo-font disable-select">King Ice Cafe</p>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="d-flex justify-content-end ms-auto">
                <button class="btn btn-dark btn-header btn-lg me-1" data-bs-toggle="modal" data-bs-target="#filterDataModal" type="button"><i class="fas fa-sort-amount-down"></i></button>
                <button class="btn btn-dark btn-header btn-lg" id="btn-search" data-bs-toggle="modal" data-bs-target="#searchMenuModal" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    </nav>
    
    <div class="container-fluid bg-dark">
        <div class="d-flex justify-content-center">
            <div class="d-flex flex-wrap mt-2 mb-2">
                <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="material-icons mt-2" style="font-size:36px;">shopping_cart</i></button>
                <button type="button" class="btn btn-dark btn-lg mx-5" data-bs-toggle="modal" data-bs-target="#aboutCafeModal"><i class="material-icons mt-2" style="font-size:36px;">store</i></button>
                <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#feedbackFormModal"><i class="material-icons mt-2" style="font-size:36px;">feedback</i></button>
            </div>
        </div>
    </div>
    
    <div class="container-fluid bg-dark mx-auto">
        <div class="row col-sm-15 col-15 col-xl-15" id="listMenu">
        <?php
        showMenuList();
        ?>
        </div>
    </div>
    
    <!--back to top-->
    <a id="back-to-top" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()" 
    class="btn btn-dark btn-sm rounded-circle float-btn" role="button"><i class="fas fa-chevron-up mb-1"></i></a>
    
    <!-- modal -->
    <div class="modal fade" id="filterDataModal" tabindex="-1" aria-labelledby="filterDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h5 class="modal-title disable-select" id="filterDataModalLabel" style="color: #FFBD30;">Urutkan menu berdasarkan</h5>
                <button type="button" class="btn btn-transparent btn-sm modal-dismiss rounded-circle mt-1" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-lg"></i></button>
            </div>
            <div class="modal-body">
                <div class="btn-group-vertical" style="width: 100%;">
                    <button type="button" id="showall" class="btn btn-dark btn-filter p-3" value="showall">Tampilkan Semua</button>
                    <button type="button" id="recommendation" class="btn btn-dark btn-filter p-3" value="recommendation">Unggulan</button>
                    <button type="button" id="popular" class="btn btn-dark btn-filter p-3" value="popular">Terpopuler</button>
                    <button type="button" id="lowestprice" class="btn btn-dark btn-filter p-3" value="lowestprice">Harga Terendah</button>
                    <button type="button" id="highestprice" class="btn btn-dark btn-filter p-3" value="highestprice">Harga Tertinggi</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="searchMenuModal" tabindex="-1" aria-labelledby="searchMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header bg-black border-0">
                <form role="form" action="" method="POST" id="search-box">
                    <div class="form-floating">
                        <input type="text" name="keyword" id="keyword" placeholder="Cari menu" autocomplete="off" class="form-control bg-transparent search-bar rounded-pill" style="width: 19rem; height:15%;">
                        <label for="keyword"><i class="fas fa-search my-auto" style="color: #FFBD30;"></i></label>
                    </div>
                </form>
                    <button type="button" class="btn btn-transparent btn-sm modal-dismiss rounded-circle" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-lg"></i></button>
                </div>

                <div class="modal-body" id="modal-body-search-result">
                    <div class="mt-0">
                        <ul class="list-group list-group-flush rounded-3 bg-dark" id="searchResult">
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModal" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h4 class="modal-title disable-select ms-2" id="cartModalLabel" style="color: #FFBD30;">Keranjang Anda</h4>
                <button type="button" class="btn btn-transparent modal-dismiss mt-2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-lg mt-1"></i></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="aboutCafeModal" tabindex="-1" aria-labelledby="aboutCafeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h4 class="modal-title disable-select ms-2" id="aboutCafeModalLabel" style="color: #FFBD30;">Info Cafe</h4>
                <button type="button" class="btn btn-transparent modal-dismiss mt-2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-lg mt-1"></i></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="feedbackFormModal" tabindex="-1" aria-labelledby="feedbackFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h4 class="modal-title disable-select ms-2" id="feedbackFormModalLabel" style="color: #FFBD30;">Kritik & Saran</h4>
                <button type="button" class="btn btn-transparent modal-dismiss mt-2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-lg mt-1"></i></button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="POST" id="feedbackForm">
                    <div class="mb-3">
                    <label for="areaCritics" class="form-label">Kritik</label>
                    <textarea class="form-control form-text-area" id="areaCritics" rows="3"></textarea>
                    </div>
                
                    <div class="mb-0">
                    <label for="areaSuggest" class="form-label">Saran</label>
                    <textarea class="form-control form-text-area" id="areaSuggest" rows="3"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade mt-4" id="filterAlertModal" tabindex="-1" aria-labelledby="filterAlertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent border-0 mt-5">
                    <div class="modal-body bg-transparent" id=filterAlertModalBody>
                        
                    </div>
            </div>
        </div>
    </div>

</div>

    <!--script-->
    <script src="/kingice/assets/js/function.script.js"></script>
    <script src="/kingice/assets/js/jquery-3.5.1.min.js"></script>
    
</body>
</html>