<?php

session_start();
if(isset($_SESSION['ID']))
    header("Location: ../index.php");

include("../includes/layouts/header.php");
?>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first" style="padding: 50px;">
      <img style="max-width: 50%;" src="../slike/login.png" id="icon" alt="icon" />
    </div>

    <form action="../kontroler/prijava.php" method="post">
      <input type="text" id="username" class="fadeIn second" name="ime" placeholder="Korisničko ime">
      <input type="password" id="password" class="fadeIn third" name="sifra" placeholder="Lozinka">
      <input type="submit" class="fadeIn fourth" value="Prijava">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#"></a>
    </div>

  </div>
</div>


<?php include("../includes/layouts/footer.php"); ?>
