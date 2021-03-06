function osvjeziTabeluProizvoda() {
    var checkBox = document.getElementById("checkboxKriticni");
    var checkBoxVraceni = document.getElementById("checkboxVraceni");

    if (checkBox.checked == true) {
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazKriticnihFiltritanihProizvoda.php?q=" + document.getElementById("searchField").value, true);
        xhr.onreadystatechange = function (ev) {
            if (this.readyState == 4 && this.status == 200) {
                zamjeniTabelu(this.responseText);
            }
        };
        xhr.send();
    } else if (checkBoxVraceni.checked == true) {
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazFiltriranihVracenihProizvoda.php?q=" + document.getElementById("searchField").value, true);
        xhr.onreadystatechange = function(ev)
        {
            if (this.readyState == 4 && this.status == 200) {
                zamjeniTabelu(this.responseText);
            }
        }
        ;
        xhr.send();
    } else {
        document.getElementById("naslovZaIzvestaj").innerText = "Izveštaj o svim proizvodima";

        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazFiltritanihProizvoda.php?q=" + document.getElementById("searchField").value, true);
        xhr.onreadystatechange = function (ev) {
            if (this.readyState == 4 && this.status == 200) {
                zamjeniTabelu(this.responseText);
            }
        };
        xhr.send();
    }
}

function osvjeziTabeluProizvodaPoDobavljacu(dobavljacID, nazivDobavljaca) {

    if(dobavljacID == 0){
        document.getElementById("naslovZaIzvestaj").innerText = "Izveštaj o svim proizvodima";

        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazFiltritanihProizvoda.php?q=" + document.getElementById("searchField").value, true);
        xhr.onreadystatechange = function (ev) {
            if (this.readyState == 4 && this.status == 200) {
                zamjeniTabelu(this.responseText);
            }
        };
        xhr.send();
    }else {
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazFiltritanihProizvodaPoDobavljacu.php?q=" + dobavljacID, true);
        xhr.onreadystatechange = function (ev) {
            if (this.readyState == 4 && this.status == 200) {
                zamjeniTabelu(this.responseText);
            }
        };
        xhr.send();
    }
}

function zamjeniTabelu(odgovor) {
    var element = document.getElementById("centralniDiv");
    element.innerHTML = odgovor;
}

function osvjeziTabeluPoslovnica() {
   var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/poslovnice.php?q="+document.getElementById("pretragaPoslovnica").value, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            zamjeniTabelu(this.responseText);
        }
    };
    xhr.send();
}

function osvjeziTabeluDobavljaca() {

    //Ako se učitava stranica prvi put elementi su null
    if(document.getElementById("pretragaDobavljaca") == null){
        dobavljac = "listaDobavljaca";
    }else{
        dobavljac = document.getElementById("pretragaDobavljaca").value;
    }

    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/dobavljaci/listaDobavljaca.php?q="+dobavljac, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            zamjeniTabelu(this.responseText);
        }
    };
    xhr.send();
}

function osvjeziTabeluRadnika() {
    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/radnici.php?q="+document.getElementById("pretragaRadnika").value, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            zamjeniTabelu(this.responseText);
        }
    };
    xhr.send();
}

function vratiProizvod(id) {
    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/proizvodi/vratiProizvod.php?q="+id, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            alert("Uspešno vracen proizvod!");
            osvjeziTabeluProizvoda();
        }
    };
    xhr.send();
}

function obrisiProizvod(id) {
    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/proizvodi/obrisiProizvod.php?q="+id, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            alert("Uspešno obrisan proizvod!");
            osvjeziTabeluProizvoda();
        }
    };
    xhr.send();
}

function obrisiDobavljaca(id) {
    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/dobavljaci/obrisiDobavljaca.php?q="+id, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            alert("Uspešno obrisan dobavljač!");
            osvjeziTabeluDobavljaca();
        }
    };
    xhr.send();
}

function obrisiRadnika(id,imePrijavljanog,imeZaBrisanje) {

    if(imePrijavljanog.toString() == imeZaBrisanje.toString())
        alert("Ne možete obrisati sebe!");
    else{
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/obrisiRadnika.php?q="+id, true);
        xhr.onreadystatechange = function (ev) {
            if(this.readyState == 4 && this.status == 200)
            {
                alert("Uspešno obrisan radnik!");
                osvjeziTabeluRadnika();
            }
        };
        xhr.send();
    }
}

function obrisiPoslovnicu(id) {
    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "kontroler/obrisiPoslovnicu.php?q="+id, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
        {
            alert("Uspešno obrisana poslovnica!");
            osvjeziTabeluPoslovnica();
        }
    };
    xhr.send();
}

function dodajProizvod() {
    var dobavljacID = document.getElementById("dobavljaciDodavanje").value;
    var rokTrajanja = document.getElementById("rokTrajanja");
    var nazivProizvoda = document.getElementById("searchField");

     if(rokTrajanja.value.length==0 || nazivProizvoda.value.length==0)
         alert("Popunite sva polja kako biste dodali proizvod.");
     else
     {
         var url = "kontroler/proizvodi/dodajNoviProizvod.php?DOB_ID="+dobavljacID+"&naziv="+nazivProizvoda.value+"&datum="+rokTrajanja.value;
         var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
         xhr.open("GET", url, true);
         xhr.onreadystatechange = function (ev) {
             if(this.readyState == 4 && this.status == 200)
             {
                 alert("Uspešno dodat proizvod!");
                 window.location.replace("index.php");
             }
         };
         xhr.send();
     }
}

function dodajNovogRadnika() {
    var ime = document.getElementById("pretragaRadnika");
    var sifra = document.getElementById("sifraRadnika");
    var poslovnicaID = document.getElementById("poslovniceSelect");

    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
    var uloge="[";
    for (var i = 0; i < checkboxes.length; i++) {
        if(i+1<checkboxes.length)
            uloge+="\""+checkboxes[i].value+"\""+",";
        else
            uloge+="\""+checkboxes[i].value+"\"";
    }
    uloge+="]";

    if(sifra.value.length==0 || ime.value.length==0)
        alert("Unesite ime i lozinku radnika za dodavanje.");
    else
    {
        var url = "kontroler/dodajNovogRadnika.php?ime="+ime.value+"&sifra="+sifra.value+"&poslovnicaID="+poslovnicaID.value+"&uloge="+uloge;
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function (ev) {
            if(this.readyState == 4 && this.status == 200)
            {
                alert("Uspešno dodat radnik!");
                window.location.replace("index.php");
            }
        };
        xhr.send();
    }
}

function dodajNovogDobavljaca() {
    var naziv = document.getElementById("nazivDobavljaca").value;
    var brojDana = document.getElementById("brojDana").value;

    if(naziv.length==0 || brojDana.length==0)
        alert("Morate popuniti sva polja");
    else
    {
        var url = "kontroler/dobavljaci/dodajNovogDobavljaca.php?naziv="+naziv+"&brojDana="+brojDana;
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function (ev) {
            if(this.readyState == 4 && this.status == 200)
            {
                alert("Uspešno dodat dobavljac!");
                window.location.replace("index.php");
            }
        };
        xhr.send();
    }
}

function dodajNovuPoslovnicu() {
    var naziv = document.getElementById("nazivPoslovnice").value;
    var nazivNovogGrada = document.getElementById("noviGrad").value;
    var gradID = document.getElementById("gradoviDodavanje").value;

    if(nazivNovogGrada.length == 0){
        if(naziv.length==0 || gradID.length==0)
            alert("Morate popuniti sva polja");
        else
        {
            var url = "kontroler/dodajNovuPoslovnicu.php?naziv="+naziv+"&gradID="+gradID;
            var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function (ev) {
                if(this.readyState == 4 && this.status == 200)
                {
                    alert("Uspešno dodata poslovnica!");
                    window.location.replace("index.php");
                }
            };
            xhr.send();
        }
    }
    else if(provjeriDaLiPostojiGrad(nazivNovogGrada))
        alert('Grad sa istim imenom već postoji!');
    else {
        if(naziv.length==0 || gradID.length==0)
            alert("Morate popuniti sva polja");
        else
        {
            var url = "kontroler/dodajNovuPoslovnicuIGrad.php?naziv="+naziv+"&nazivGrada="+nazivNovogGrada;
            var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function (ev) {
                if(this.readyState == 4 && this.status == 200)
                {
                    alert("Uspešno dodata poslovnica!");
                    window.location.replace("index.php");
                }
            };
            xhr.send();
        }
    }
}

function provjeriDaLiPostojiGrad(nazivGrada) {

    var x = document.getElementById("gradoviDodavanje");

    for (i = 0; i < x.length; i++) {
        if(x.options[i].text.toLowerCase() == nazivGrada.toLowerCase())
            return true;
    }

    return false;
}

function izmjeniProizvod() {

    var idProizvoda = document.getElementById("idProizvoda");
    var dobavljacID = document.getElementById("dobavljaciModal");
    var rokTrajanja = document.getElementById("rokTrajanjaModal");
    var nazivProizvoda = document.getElementById("nazivProizvodaModal");

    if(rokTrajanja.value.length==0 || nazivProizvoda.value.length==0)
        alert("Popunite sva polja kako biste izmjenili proizvod.");
    else
    {
        var url = "kontroler/proizvodi/izmjeniProizvod.php?ID="+idProizvoda.value+"&DOB_ID="+dobavljacID.value+"&naziv="+nazivProizvoda.value+"&datum="+rokTrajanja.value;
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function (ev) {
            if(this.readyState == 4 && this.status == 200)
            {
                alert("Uspešno izmenjen proizvod!");
                window.location.replace("index.php");
            }
        };
        xhr.send();
    }
}