<div class="col-md-9">
    <?php

    // tangkap request di url
    // note:
    // agar tidak error diberi nilai default null
    // jika tidak ada parameter yg dimaksud

    $hal = $_REQUEST['hal'] ?? null;
    if (!empty($hal)) {
        include_once $hal . '.php';
    } else {
        include_once 'home.php';
    }

    ?>

</div>