<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img class="navbar-brand" style="max-width: 3%; cursor: pointer;" src="slike/login.png" id="icon" alt="icon" onclick="location.href='index.php'"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active" id="index">
                <a class="nav-link" href="index.php">Proizvodi <span class="sr-only">(current)</span></a>
            </li>
            <?php
            foreach ($privilegije->dobijDozvole() as $dozvola){
                if($dozvola == "citanje_liste_poslovnica") {
                    echo "<li class='nav-item' id='poslovnice' >
                            <a class='nav-link' id='listaPoslovnica' onclick='promjeniSadrzaj(this.id)' style='cursor: pointer;'>Lista poslovnica</a>
                         </li>";
                } else if($dozvola == "citanje_liste_dobavljaca") {
                    echo "<li class='nav-item' id='dobavljaci' >
                            <a class='nav-link' id='listaDobavljaca' onclick='promjeniSadrzaj(this.id)' style='cursor: pointer;'>Lista dobavljača</a>
                          </li>";
                }
                else if($dozvola == "citanje_liste_radnika") {
                    echo "<li class='nav-item' id='radnici' >
                            <a class='nav-link' id='listaRadnika' onclick='promjeniSadrzaj(this.id)' style='cursor: pointer;'>Lista radnika</a>
                          </li>";
                }
            }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <h4 style="color: white; margin-right: 20px;">Zdravo <?php echo $_SESSION['ime'];?></h4>
            <a class="btn btn-primary" href="odjava.php">Odjavi se</a>
        </form>
    </div>
</nav>