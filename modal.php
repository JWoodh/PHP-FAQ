<?php
$active_page = 'modal';
include_once 'header.php';
?>



<style>
/* Modal Content/Box */
#popup{
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
}

#popupinnhold{
    background-color: thistle;
    margin: 15% auto;
    padding: 20px 30px 20px 30px;
    width: 70%;
}

#lukkpopup{
    color: #787878;
    float: right;
    font-size: 30px;
    margin: 0 auto;
}

#lukkpopup:hover{
    color: black;
    cursor: pointer;
}
</style>

<button id="myBtn">Open Modal</button>

<div id="popup">
        <div id="popupinnhold">
            <p id="lukkpopup" onclick="lukk()">x</p>
            <p>Bestilling bekreftet</p>
        </div>
</div>
<!--
    <div id="myModal" class="modal">
        <div class="modal-content">
            
            <p>Vennligst logg inn:</p>
            <form method="post">
                <label for="brukernavn">Brukernavn:</label>
                <input type="text" name="brukernavn" /><br />
                <label for="passord">Passord:</label>
                <input type="password" name="passord" /><br />
                
                <input type="submit" value="Logg inn" name="submit" />
            </form>
            <p>Eller klikk <a href="registration.php">her</a> for å registrere ny bruker
        </div>
    </div>
    
    
-->

<script type="text/javascript">

    // Get the modal
var popup = document.getElementById("popup");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("lukkpopup");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  popup.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  popup.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}
</script>