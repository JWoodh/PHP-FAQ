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
    <h1 class="midtstill">Brukerstøtte</h1>
    <div class="midtstill" class="link"><a href="https://udeoslokommuneno-my.sharepoint.com/:v:/r/personal/jowoa002_osloskolen_no/Documents/IM/Java/Sp%C3%A6ll/Spaell/Oppl%C3%A6ring%20sluttbruker.mp4?csf=1&web=1&e=wxFhY1">Opplæringsvideo for sluttbruker</a></div>
    <div class="midtstill" class="link"><a href="https://udeoslokommuneno-my.sharepoint.com/:w:/g/personal/jowoa002_osloskolen_no/EZMzxX5h4FVGgbZOQdypJ3gBLPrqPjLUIQJS-81R5Ir_DA?e=jPRHr1">Opplæring tekstdokument bruker</a></div>
</body>
</html>