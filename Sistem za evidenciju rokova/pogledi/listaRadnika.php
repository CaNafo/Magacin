<?php

header('Content-type: text/html; charset=utf-8');
?>
<div class="container mt-3">
        <div class="input-group mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Ime radnika" id="pretragaRadnika"  onkeyup="osveziTabeluRadnika();">
            <select id="poslovniceSelect" class="dropbtn" style="margin-left: 15px;">
                <?php
                    include '../kontroler/poslovniceSelectKontroler.php';
                ?>
            </select>
            <input type="text" style="margin-left: 15px; text-align: center;" placeholder="Lozinka" id="sifraRadnika"  onkeyup="osveziTabeluRadnika();">
            <button class="btn btn-info dropbtn" style="margin-left: 15px;" onclick="otvoriModalniDialogZaUloge()">Dodaj</button>
        </div>
</div>
<div class="container">
    <div id="centralniDiv">
        <?php include '../kontroler/radnici.php' ?>
    </div>

    <div id="modalDialogUloge" class="modalUloge center">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Odaberi uloge za korisnika</h2>
                <span onclick="zatvoriModalniProzor();" class="close">&times;</span>
            </div>
            <div style="text-align: center;">
                <?php
                include "../kontroler/ulogeKontroler.php";
                ?>
                <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="dodajNovogRadnika();" >Potvrdi</button>
            </div>
            <div class="modal-footer">
                <h3>Sistem za evidenciju 2020</h3>
            </div>
        </div>

    </div>
</div>