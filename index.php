<?php
$active_page = 'login';
session_start();
if(isset($_SESSION['privileg'])){
    unset($_SESSION['privileg']);
}
include_once 'header.php';
include_once 'conn.php';
?>

<div id="popup">
        <div id="popupinnhold">
            <p id="lukkpopup" onclick="lukk()">x</p>
            <p>Brukernavn eller passord er feil</p>
        </div>
    </div>
<div class="forms">
<p>Vennligst logg inn:</p>
<form method="post">
    
    <label for="brukernavn">Brukernavn:</label>
    <input type="text" name="brukernavn" id="brukernavn"/><br />
    <label for="passord">Passord:</label>
    <input type="password" name="passord" id="passord"/><br />
    <br>
    <input type="submit" value="Logg inn" name="submit" />
</form>
</div>
<div class="oransje"></div>

<?php
    include_once 'footer.php';
    
    if(isset($_POST['submit'])){
        //Gjøre om POST-data til variabler
        $brukernavn = $_POST['brukernavn'];
        $passord = $_POST['passord'];
        
        //Gjøre klar SQL-strengen
        $sql = "SELECT * FROM users WHERE username='$brukernavn' AND password='$passord'";
        
        //Utføre spørringen
        $result = mysqli_query($kobling, $sql)
            or die('Error querying database.');
        

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION['privileg'] = $row['admin'];
                header("location: faq.php"); // Oppdaterer siden så de nye resultatene blir vist
            }
        } else{
            echo '<script type="text/javascript">',
            'document.getElementById("popup").style.display = "block";',
            '</script>';
            // echo "Noe gikk galt med spørringen $sql ($kobling->error).";
        }
    }
?>
<script>
var popup = document.getElementById("popup");
var lukkpopup = document.getElementById("lukkpopup");

lukkpopup.onclick = function() {
    popup.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
</script>