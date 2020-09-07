<link href = "stylesheets/stilDodavanje.css" media="all" rel = "stylesheet" type = "text/css" />

<div class="container mt-3" id="dodavanjeProizvodaContainer" style="text-align: center; margin: 0 auto;">
    <div id="divZaPozadinu">
        <h2 style="text-align: center;">Dodajte novog dobavljača</h2><br>
        <div>
            <label>Unesite naziv dobavljača</label><br>
            <input type="text" class="form-control" placeholder="Naziv dobavljača" id="nazivDobavljaca" style="width: 25%; display: inline-block; text-align: center;">
        </div><br>
        <label>Unesite koliko dana prije isteka roka trajanja robe, ovaj dobavljač zahtjeva povratak</label><br>
        <input type="number" class="form-control" placeholder="Broj dana" id="brojDana" style="width: 25%; display: inline-block; text-align: center;">
        <br>
        <br>
        <button class="btn-info dropbtn" style="margin-left: 5px;" onclick="dodajNovogDobavljaca();" >Dodaj</button>
    </div>

</div>