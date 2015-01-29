<?php
    session_start();
    /*echo $_SESSION['access_token'];
    echo $_SESSION['access_token'];
    exit();*/
    if(!isset($_SESSION['access_token']) || empty($_SESSION['access_token'])) {

        $protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
        $root_uri = $protocol . $_SERVER['HTTP_HOST'].'/sinmin-web/login.php';
        header('Location: '.$root_uri);
    }
?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand-img" href="index.php"><img src="images/Logo_96x96.png"></a>
</div>

<div class="header-pull-right">
    <span>You are logged in as </span>
    <?php
        if ($_SESSION['auth_type']='google') {
            echo $_SESSION['email'];
        }
    ?>
    <a href="<?php 
        if ($_SESSION['auth_type']='google') {
            echo $_SESSION['logout'];
        }  ?>">(Logout)</a>
</div>