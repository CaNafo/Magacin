<link href = "stylesheets/stilDodavanje.css" media="all" rel = "stylesheet" type = "text/css" />

<div class="container mt-3" id="dodavanjeProizvodaContainer" style="text-align: center; margin: 0 auto;">
    <div id="divZaPozadinu">
        <h2 style="text-align: center;">Dodajte novog radnika</h2><br>
        <div>
            <label>Unesite ime radnika</label><br>
            <input type="text" class="form-control" placeholder="Ime radnika" id="pretragaRadnika" style="width: 25%; display: inline-block; text-align: center;">
        </div><br>
        <label>Izaberite poslovnicu</label><br>
        <select id="poslovniceSelect" class="dropbtn" style="margin-left: 15px;">
            <?php
                include '../kontroler/poslovniceSelectKontroler.php';
            ?>
        </select><br><br>
        <label>Unesite lozinku</label><br>
        <input type="text" style="margin-left: 15px; text-align: center;" placeholder="Lozinka" id="sifraRadnika"  onkeyup="osvjeziTabeluRadnika();"><br><br>
        <div style="text-align: center;">
            <?php
            include "../kontroler/ulogeKontroler.php";
            ?>
        </div>
        <br>
        <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="dodajNovogRadnika();" >Dodaj</button>
    </div>

</div>