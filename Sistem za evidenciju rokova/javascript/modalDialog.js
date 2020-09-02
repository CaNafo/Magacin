// Get the modal
var modal = document.getElementById("modalDialog");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

function otvoriModalniDialog(id, idProizvoda){
    var redovi = document.getElementsByTagName("tr");
    modal.style.display = "block";
    document.getElementById("nazivProizvodaModal").value=redovi[id].getElementsByTagName("td")[0].innerHTML;
    document.getElementById("rokTrajanjaModal").value=format(redovi[id].getElementsByTagName("td")[2].innerHTML.substr(0,10));
    document.getElementById("idProizvoda").value = idProizvoda;
}

function otvoriModalniDialogZaUloge(){
    document.getElementById("modalDialogUloge").style.display = "block";
}

function zatvoriModalniProzor(){
    document.getElementById("modalDialogUloge").style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function format(inputDate) {
    var date = new Date(inputDate);
    if (!isNaN(date.getTime())) {
        // Months use 0 index.
        return date.getMonth() + 1 + '/' + date.getDate() + '/' + date.getFullYear();
    }
}