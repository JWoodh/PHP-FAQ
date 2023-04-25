<html>
    <head>

        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>FAQ</title>

    </head>
    <body>
        <?php 
        if(!isset($_SESSION['privileg'])){
            header("location: index.php");
        } 
            // echo "<div class='topnav'>";
            // echo '<a href="faq.php" if ($active_page == "faq"){ echo "class="active"";};>FAQ</a>';
            // echo '<a href="brukerstotte.php" if ($active_page == "brukerstotte"){ echo "class="active"";};>Brukerstøtte </a>';
            // echo '<a href="answer.php" if ($active_page == "answer"){ echo "class="active"";};>Answer</a>';
            // echo '<a id="logout" href="logout.php">Logout</a>';
            // echo '</div>';

            // switch($active_page){
            //     case 'faq': echo 'class="active"'; break;
            //     case 'brukerstotte': echo 'class="active"'; break;
            //     case 'answer': echo 'class="active"'; break;
            // }
        ?>  

        <div class="topnav">
            <a href="faq.php" <?php if ($active_page == 'faq'){ echo 'class="active"';};?>>FAQ</a>
            <a href="brukerstotte.php" <?php if ($active_page == 'brukerstotte'){ echo 'class="active"';};?>>Brukerstøtte </a>
            <a href="answer.php" <?php if ($active_page == 'answer'){ echo 'class="active"';};?>>Svar</a>
            <a id="logout" href="logout.php" <?php if ($active_page == 'logout'){ echo 'class="active"';};?>>Logout</a>
        </div>