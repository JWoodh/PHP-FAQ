<?php
$active_page = 'answer';
include_once 'conn.php';
session_start();
include_once 'faqheader.php';

$get = "SELECT * FROM questions WHERE answer = ''";
$result1 = mysqli_query($kobling, $get);
$ids = array();

echo '<form class="form" method="post">';
while ($row = mysqli_fetch_array($result1)) {
    $id = $row['id'];
    $quest = $row['question'];
    echo '<div class="faq">';
    echo '<h3 class="faqtext">';
    echo $quest;
    echo '</h3>';
    echo "<input type='text' class='answer' name='$id'>";
    echo '</div>';
    array_push($ids, $id);
}
echo '<input id="answerbutton" type="submit" name="submit">';
echo '</form';

if (isset($_POST['submit'])) {
    //Gjøre om POST-data til variabler
    for ($i = 0; $i < count($ids); $i++) {
        $svar = mysqli_real_escape_string($kobling, $_POST["$ids[$i]"]);
        if ($svar != '') {
            $sql = "UPDATE questions SET answer = '$svar' WHERE id = '$ids[$i]'";

            //Kjør sql spørringen
            $result = mysqli_query($kobling, $sql)
                or die('Error querying database.');

            if (!$result) {
                echo "Noe gikk galt, prøv igjen!";
            }
        }
    }
}



?>
