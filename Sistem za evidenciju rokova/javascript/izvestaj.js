function stampaj(){
    var list = document.getElementsByName("sakrivenaKolona");

    for(var i=0; i<list.length; i++){
        list[i].style.display="none"
    }

    var vratiStranicu = document.body.innerHTML;


    var naslovIzvestaja = document.getElementById("naslovZaIzvestaj");
    naslovIzvestaja.style.display = "inline";

    var stampajSadrzaj = document.getElementById("divZaIzvestaj").innerHTML;
    document.body.innerHTML = stampajSadrzaj;
    window.print();
    document.body.innerHTML = vratiStranicu;


    document.getElementById("checkboxKriticni").checked = false;
    document.getElementById("checkboxVraceni").checked = false;

    osveziTabeluProizvoda();

}