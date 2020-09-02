<?php

header('Content-type: text/html; charset=utf-8');
?>
<div class="container mt-3">
    <form>
        <div class="input-group mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Naziv dobavljača" id="pretragaDobavljača"  onkeyup="osvjeziTabeluPoslovnica();">
        </div>
        <button class="btn btn-primary" style="margin-bottom: 5px;">Dodaj novog dobavljača</button>
    </form>
</div>
<div class="container">
    <div id="centralniDiv">
        <?php
        include '../kontroler/listaDobavljaca.php'
        ?>
    </div>
</div>