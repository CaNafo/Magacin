<link href = "stylesheets/stilDodavanje.css" media="all" rel = "stylesheet" type = "text/css" />

<div class="container mt-3" id="dodavanjeProizvodaContainer" style="text-align: center; margin: 0 auto;">
    <div id="divZaPozadinu">
        <h2 style="text-align: center;">Dodajte novu poslovnicu</h2><br>
        <div>
            <label>Unesite naziv poslovnice</label><br>
            <input type="text" class="form-control" placeholder="Naziv poslovnice" id="nazivPoslovnice" style="width: 25%; display: inline-block; text-align: center;">
        </div><br>
        <label>Odaberite grad</label><br>
        <select class="dropbtn" style="margin-left: 5px;" id="gradoviDodavanje">
            <?php
            include '../PomocneKlase/ApiPoziv.php';
            include '../PomocneKlase/ApiReferenca.php';
            include  '../kontroler/gradovi.php';
            ?>
        </select><br><br>
        <label>Ili unesite novi Grad</label><br>
        <input type="text" class="form-control" placeholder="Ime grada" id="noviGrad" style="width: 25%; display: inline-block; text-align: center;">
        <br>
        <br>
        <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="dodajNovuPoslovnicu();" >Dodaj</button>
    </div>

</div>