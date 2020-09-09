<link href = "stylesheets/stilDodavanje.css" media="all" rel = "stylesheet" type = "text/css" />

<div class="container mt-3" id="dodavanjeProizvodaContainer" style="text-align: center; margin: 0 auto;">
    <div id="divZaPozadinu">
        <h2 style="text-align: center;">Dodajte novi proizvod</h2><br>
        <div>
            <label>Unesite naziv proizvoda</label><br>
            <input type="text" class="form-control" placeholder="Naziv proizvoda" id="searchField" style="width: 25%; display: inline-block; text-align: center;"><br><br>
        </div>
        <label>Izaberite dobavljača</label><br>
        <select class="dropbtn" style="margin-left: 5px;" id="dobavljaciDodavanje">
            <?php
            include '../PomocneKlase/ApiPoziv.php';
            include '../PomocneKlase/ApiReferenca.php';
            include  '../kontroler/dobavljaciDodavanje.php';
            ?>
        </select><br><br>
        <label>Unesite rok trajanja proizvoda</label><br>
        <input id="rokTrajanja" placeholder="Rok trajanja" data-provide="datepicker" style="margin-left: 5px; text-align: center;">
        <br><br>
        <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="dodajProizvod()">Dodaj proizvod</button>
    </div>
</div>