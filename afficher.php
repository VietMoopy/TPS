<!DOCTYPE html>
<html>

<head>
  <meta charset="latin1">
  <meta name="viewport" content="width=device-width">
  <title>Profs</title>
</head>
<body>
  <h1>Profs</h1>
  <table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
    </tr>
  </thead>
    <?php
		
$link=mysqli_connect("dwarves.iut-fbleau.fr","nguyen","nguyenphpmyadmin","nguyen");
  if(!$link){
    die("<p>connexion impossible</p>");
  }
  $resultat=mysqli_query($link,"SELECT nom,prenom FROM Enseignant");
  if($resultat){
    $i = 1;
    while($prof=mysqli_fetch_assoc($resultat)){
      echo "<tr>";
	    echo "<td><a href=\"./fiche.php?prof=$i\">".$prof['nom']."</a></td>";
    	echo "<td>".$prof['prenom']."</td>";
	    echo "</tr>";
      $i = $i + 1;
    }
  }
   else{
        die("<p>Erreur dans l'éxécution de la requête. </p>");
   }
    mysqli_close($link);
?>
  </table>
</body>

</html>
