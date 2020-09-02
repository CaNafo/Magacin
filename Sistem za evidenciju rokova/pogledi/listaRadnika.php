<?php

header('Content-type: text/html; charset=utf-8');
?>
<div class="container mt-3">
        <div class="input-group mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Ime radnika" id="pretragaRadnika"  onkeyup="osvjeziTabeluRadnika();">
            <select id="poslovniceSelect" class="dropbtn" style="margin-left: 15px;">
                <?php
                    include '../kontroler/poslovniceSelectKontroler.php';
                ?>
            </select>
        </div>
    <button class="btn btn-primary" style="margin-bottom: 5px;" onclick="zamjeniSadrzaj('dodajRadnika')">Dodaj novog radnika</button>

</div>
<div class="container">
    <div id="centralniDiv">
        <?php include '../kontroler/radnici.php' ?>
    </div>

</div>