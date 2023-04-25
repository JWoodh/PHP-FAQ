<html>
    <head>

        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>Logg inn</title>

    </head>
    <body id="nonslidebody">
        <div class="topnav">
            <a href="index.php" <?php if ($active_page == 'login'){ echo 'class="active"';};?>>Login</a>
            <a href="registration.php" <?php if ($active_page == 'registration'){ echo 'class="active"';};?>>Register </a>
            <a href="faq.php" <?php if ($active_page == 'faq'){ echo 'class="active"';};?>>FAQ</a>
            <a href="brukerstotte.php" <?php if ($active_page == 'brukerstotte'){ echo 'class="active"';};?>>Brukerstøtte </a>
        </div>

