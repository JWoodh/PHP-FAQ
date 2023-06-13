<?php
$active_page = 'registration';
include_once 'header.php';
include_once 'conn.php';
?>
<div id="popup">
    <div id="popupinnhold">
        <p id="lukkpopup" onclick="lukk()">x</p>
        <p>Brukeren finnes allerede🥺😿</p>
    </div>
</div>

<div class="forms">
    <p>Opprett ny bruker:</p>
    <form method="post">
        <label for="brukernavn">Brukernavn:</label>
        <input type="text" name="brukernavn" /><br />
        <label for="passord">Passord:</label>
        <input type="password" name="passord" /><br />
        <br>
        <input type="submit" value="Registrer" name="submit" />
    </form>
</div>
<div class="oransje"></div>
<?php
include_once 'footer.php';

if (isset($_POST['submit'])) {
    //Definere variabler
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];
    $health = 100;
    $weapon = 'branch';
    $pet = 'goldfish';
    $room = 0;
    $weaponIndex = 1;
    $petIndex = 5;
    $admin = 0;

    $sql = "SELECT * FROM users WHERE username='$brukernavn'";

    // Utføre spørringen
    $result = mysqli_query($kobling, $sql)
        or die('Error querying database.');


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<script type="text/javascript">',
                'document.getElementById("popup").style.display = "block";',
                '</script>';
        }
    } else {
        //Gjøre klar SQL-strengen
        $sqlin = "INSERT INTO users (username, password, health, weapon, pet, room, weaponIndex, petIndex, admin) VALUES ('$brukernavn','$passord', '$health', '$weapon', '$pet', '$room', '$weaponIndex', '$petIndex', '$admin')";

        //Utføre spørringen
        $resultin = mysqli_query($kobling, $sqlin)
            or die('Error querying database.');

        if ($resultin) {
            session_start();
            $_SESSION['privileg'] = 0;
            header("location: faq.php"); // Oppdaterer siden så de nye resultatene blir vist
            // echo "Noe gikk galt med spørringen $sql ($kobling->error)."
        }
    }
}

?>
<script>
    var popup = document.getElementById("popup");
    var lukkpopup = document.getElementById("lukkpopup");

    lukkpopup.onclick = function () {
        popup.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
</script>
<?php

// //Sjekke om spørringen gir resultater
// if ($result) {
//     //Gyldig login
//     session_start();
//     $_SESSION["privileg"] = '0';
//     header("location: faq.php");
// } else {
//     //Ugyldig login
//     echo "Noe gikk galt, prøv igjen!";
// }

?>