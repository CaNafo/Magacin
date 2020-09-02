
<?php require_once("includes/session.php");
if(!isset($_SESSION['ime']))
    header("Location: pogledi/prijavaForma.php");

include "privilegije.php";
include("includes/layouts/header.php");
include ("includes/layouts/navbar.php");
 ?>
<div id="sadrzajStranice">
    <div class="container mt-3">
        <div class="input-group mt-3 mb-3">
            <button class="btn btn-primary" style="margin-right: 15px;" onclick="stampaj()">Izvještaj</button>
            <input type="text" class="form-control" placeholder="Naziv proizvoda" id="searchField"  onkeyup="osvjeziTabeluProizvoda();">

            <select class="dropbtn" style="margin-left: 5px;" id="dobavljaci">
                <?php
                include 'kontroler/dobavljaci.php';
                ?>
            </select>
            <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="zamjeniSadrzaj('dodajProizvod')">Dodaj novi proizvod</button>
        </div>
    </div>
    <div class="container">
        <input type="checkbox" id="checkboxKriticni" onchange="proizvodiSaKriticnimDatumom()">Proizvodi sa kritičnim datumom<br>
        <input type="checkbox" id="checkboxVraceni" onchange="vraceniProizvodi()">Vraćeni proizvodi<br>
        <div id="divZaIzvestaj">
            <div style="text-align: center; margin-bottom: 10px;">
                <h2 id="naslovZaIzvestaj" style="display: none;" >Izveštaj o proizvodima</h2>
            </div>
            <div id="centralniDiv">
                <?php include("kontroler/proizvodi/prikazSvihProizvoda.php");?>
            </div>
        </div>
    </div>
</div>
<div id="modalDialog" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>Izmjeni proizvod</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body input-group mt-3 mb-3">
            <input id="idProizvoda" style="display: none;">
            <input style="text-align: center;" type="text" id="nazivProizvodaModal"><br>
            <select class="btn-warning dropbtn" style="margin-left: 5px;" id="dobavljaciModal">
                <?php
                include 'kontroler/dobavljaci.php';
                ?>
            </select>
            <input id="rokTrajanjaModal" placeholder="Rok trajanja" data-provide="datepicker" style="margin-left: 5px; text-align: center;">
            <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="izmjeniProizvod()">Izmjeni</button>
        </div>
        <div class="modal-footer">
            <h3>Sistem za evidenciju 2020</h3>
        </div>
    </div>

</div>

<script src="javascript/javascriptAJAX.js"></script>
<script src="javascript/javascriptUpravljanjeSadrzajem.js"></script>
<script src="javascript/modalDialog.js"></script>
<script src="javascript/izvestaj.js"></script>

<?php include ("includes/layouts/footer.php");?>