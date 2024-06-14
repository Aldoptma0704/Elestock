<?php
include 'authadmin.php';


if ($akses !== 1){
    header("Location: HomePage.php");
    
}
?>    

    <nav class="navbar navbar-expand-lg text-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard_admin.php"><img src="../IMG/Logo.svg" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="location.php">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supplier.php">Supplier</a>
                    </li>
                    
                </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <img src="../IMG/logout_icon.svg" alt="Logout">
                        </a>
                    </li>
            </div>
        </div>
    </nav>
    <!-- <div class="sidebar">
        <a href="dashboard.php"><i class="lni lni-clipboard"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-graph"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-stats-up"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-dropbox"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-database"></i></a><br>
    </div> -->