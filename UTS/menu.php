<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-2 mb-3">
<div class="container">

    <a class="navbar-brand" href="#">My App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-link active mx-3" href="index.php?hal=home">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link mx-3" href="index.php?hal=aboutus">About Us</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ml-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">Pilih Data</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="index.php?hal=dataPegawai">Pegawai</a>
            </li>
            <?php
              $member = $_SESSION['MEMBER']?? null;
              if(!isset($member)){
            ?>
              
                <a class="nav-link mx-3 btn btn-outline-success" href="index.php?hal=formLogin">Login</a>
              <?php
              }else{
              ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $member['fullname']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?hal=dataUser">Users</a>
                  <a class="dropdown-item" href="#">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                </li>
              <?php  
              }
              ?>
        </div>
    </div>
</div>  
</nav>
<div class="row">