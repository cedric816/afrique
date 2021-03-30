<?php
  define("PAGE_TITLE", "Traitement");
  require("inc/inc.kickstart.php");
?>

<main class="pays-creer">
<?php
  $name = $_POST['country_name'];
  $flag = $_POST['country_flag'];
  $capital = $_POST['country_capital'];
  $area = $_POST['country_area'];

  $requete = "INSERT INTO `country` (`country_name`, `country_flag`, `country_capital`, `country_area`) VALUES (:name, :flag, :capital, :area)";
  //requête préparée pour éviter les injections SQL
  $prep = $pdo->prepare($requete);
  $prep->execute(array(
    ':name'=>$name,
    ':flag'=>$flag,
    ':capital'=>$capital,
    ':area'=>$area
  ));
  
  echo "<h3>Merci !</h3>";
  echo "<p>Voici un récapitulatif de votre contribution :</p>";
  echo "<ul>"
  //htmlentities pour échapper les caractères spéciaux et éviter les failles XSS
      ."<li>Nom du pays : " . htmlentities($_POST["country_name"], ENT_QUOTES) . "</li>"
      ."<li>Capitale du pays : " . htmlentities($_POST["country_capital"], ENT_QUOTES) . "</li>"
      ."<li>Drapeau du pays : " . htmlentities($_POST["country_flag"], ENT_QUOTES) . "</li>"
      ."<li>Superficie du pays (en km²) : " . htmlentities($_POST["country_area"], ENT_QUOTES) . "</li>"
      ."<ul>";
  echo "<a href='page-pays-liste-alpha.php'><button>Consulter la liste des pays</button></a>";

?>
</main>

<?php require("inc/inc.footer.php"); ?>