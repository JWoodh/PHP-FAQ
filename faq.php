<?php
$active_page = 'faq';
session_start();
include_once 'conn.php';
if (isset($_SESSION['privileg'])) {
    $privileg = $_SESSION['privileg'];

    if ($privileg == '1') {
        include_once 'faqheader.php';
    } else if ($privileg == '0') {
        include_once 'loginheader.php';
    }
} else {
    include_once 'header.php';
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FAQU</title>
</head>

<body>
    <h1 class="midtstill">Ofte Stilte Spørsmål</h1>
    <div class="container">

        <?php
        $get = "SELECT question,answer FROM questions WHERE answer != ''";
        $result1 = mysqli_query($kobling, $get);
        while ($row = mysqli_fetch_array($result1)) {
            echo "<div tabindex='0' class='faq'>";
            echo '<h3 class="faqtext">';
            echo $row['question'];
            echo '</h3>';
            echo '<p class="faqtext">';
            echo $row['answer'];
            echo '</p> </div>';
        }
        if (isset($_SESSION['privileg'])) {
            echo '<br>';
            echo '<div class="faq">';
            echo '<form method="POST">';
            echo '<h3>Skriv ditt eget spørsmål</h3>';
            echo '<textarea name="spørsmål" cols="30" rows="4" placeholder="Spørsmål"></textarea>';
            echo '<input type="submit" name="submit">';
            echo '</form>';
            echo '</div>';
        }
        ?>
        <br>
        <!-- <div class="faq">
        <form method="POST">
        <h3>Skriv ditt eget spørsmål</h3>
        <textarea name="spørsmål" cols="30" rows="4" placeholder="Spørsmål"></textarea>
        <input type="submit" name="submit">
        </form>
    </div> -->
        <?php
        if (isset($_POST['submit'])) {
            //Gjøre om POST-data til variabler
            $question = mysqli_real_escape_string($kobling, $_POST['spørsmål']);
            $answer = '';


            //Gjøre klar SQL-strengen
            if ($question != '') {
                $sql = "INSERT INTO questions (question, answer) VALUES ('$question', '$answer')";
            }

            //Utføre spørringen
            $result = mysqli_query($kobling, $sql)
                or die('Error querying database.');

            if ($result) {
                echo "<p>Spørsmålet er sendt inn og blir behandlet</p>";
            } else {
                // noe funka ikke
                echo "Noe gikk galt, prøv igjen!";
            }
        }
        ?>

    </div>
    <?php
    if (!isset($_SESSION['privileg'])) {
        echo '<h3 class="midtstill">Logg inn eller registrer for å sende inn egne spørsmål</h3>';
    }
    include_once 'footer.php';
    ?>