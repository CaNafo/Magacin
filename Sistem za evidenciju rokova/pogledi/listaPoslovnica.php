<?php

header('Content-type: text/html; charset=utf-8');
?>
<div class="container mt-3">
    <form>
        <div class="input-group mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Naziv poslovnice" id="pretragaPoslovnica"  onkeyup="osvjeziTabeluPoslovnica();">
        </div>
    </form>
    <button class="btn btn-primary" style="margin-bottom: 5px;" onclick="zamjeniSadrzaj('dodajPoslovnicu')">Dodaj novu poslovnicu</button>
</div>
<div class="container">
    <div id="centralniDiv">
        <?php include '../kontroler/poslovnice.php' ?>
    </div>
</div>