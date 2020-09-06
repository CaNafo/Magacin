function promjeniSadrzaj(idKliknutogElementa) {

    if(idKliknutogElementa.toString() == "listaPoslovnica"){
        document.getElementById("index").classList.remove('active');
        document.getElementById("poslovnice").classList.add('active');
        document.getElementById("radnici").classList.remove('active');
        document.getElementById("dobavljaci").classList.remove('active');

    } else if(idKliknutogElementa.toString() == "listaRadnika") {
        document.getElementById("index").classList.remove('active');
        document.getElementById("poslovnice").classList.remove('active');
        document.getElementById("radnici").classList.add('active');
        document.getElementById("dobavljaci").classList.remove('active');

    }else if(idKliknutogElementa.toString() == "listaDobavljaca") {
        document.getElementById("index").classList.remove('active');

        if(document.getElementById("poslovnice") != null)
            document.getElementById("poslovnice").classList.remove('active');

        if(document.getElementById("radnici") != null)
            document.getElementById("radnici").classList.remove('active');

        document.getElementById("dobavljaci").classList.add('active');
    }
    zamjeniSadrzaj(idKliknutogElementa.toString());
}

function zamjeniSadrzaj(id) {
    var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
    xhr.open("GET", "PomocneKlase/ZamjeniStranicu.php?q="+id, true);
    xhr.onreadystatechange = function (ev) {
        if(this.readyState == 4 && this.status == 200)
            var element = document.getElementById("sadrzajStranice");

            var response = this.responseText;
            var lastChar = response.substr(response.length - 1);

            if(lastChar!='>'){
                response = response.substr(0,response.length-1);
            }

            if(element != undefined)
            element.innerHTML = response;
    };
    xhr.send();
}

function proizvodiSaKriticnimDatumom() {
    var checkBox = document.getElementById("checkboxKriticni");
    var checkBoxVraceni = document.getElementById("checkboxVraceni");

    document.getElementById("naslovZaIzvestaj").innerText = "Izveštaj o proizvodima sa kritičnim datumom";

    if (checkBox.checked == true) {
        checkBoxVraceni.checked = false;
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazKriticnihProizvoda.php", true);
        xhr.onreadystatechange = function (ev) {
            if (this.readyState == 4 && this.status == 200) {
                var element = document.getElementById("centralniDiv");

                if(element != undefined)
                element.innerHTML = this.responseText;
            }
        };
        xhr.send();
    }else{
        window.location.replace("index.php");
    }
}

function vraceniProizvodi() {
    var checkBox = document.getElementById("checkboxKriticni");
    var checkBoxVraceni = document.getElementById("checkboxVraceni");

    document.getElementById("naslovZaIzvestaj").innerText = "Izveštaj o vraćenim proizvodima";

    if (checkBoxVraceni.checked == true) {
        checkBox.checked = false;
        var xhr = (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
        xhr.open("GET", "kontroler/proizvodi/prikazVracenihProizvoda.php", true);
        xhr.onreadystatechange = function (ev) {
            if (this.readyState == 4 && this.status == 200)
                var element = document.getElementById("centralniDiv");

            if(element != undefined)
                element.innerHTML = this.responseText;
        };
        xhr.send();
    }else{
        window.location.replace("index.php");
    }
}