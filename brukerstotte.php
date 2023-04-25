<?php $active_page='brukerstotte';
session_start();
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
    <h1 class="midtstill">Brukerstøtte wooohoo</h1>
</body>
</html>