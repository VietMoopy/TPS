<!DOCTYPE html>
<html>

<head>
  <meta charset="latin1">
  <meta name="viewport" content="width=device-width">
  <title>Profs</title>
</head>
<body>
  </thead>
    <?php
$link=mysqli_connect("dwarves.iut-fbleau.fr","nguyen","nguyenphpmyadmin","nguyen");
  if(!$link){
    die("<p>connexion impossible</p>");
  }
  $id = extract($_GET);
  $resultat=mysqli_query($link,"SELECT id,nom,prenom,email,bureau FROM Enseignant WHERE id = $id");
  if($resultat){
    while($prof=mysqli_fetch_assoc($resultat)){
	    echo "<a> Id : ".$prof['id']."</h1>";
      echo "<br>";
	    echo "<a> Nom : ".$prof['nom']."</a>";
      echo "<br>";  
    	echo "<a> Prenom : ".$prof['prenom']."</a>";
      echo "<br>";  
    	echo "<a> Email : ".$prof['email']."</a>";
      echo "<br>";  
    	echo "<a> Bureau : ".$prof['bureau']."</a>";
    }
  }
   else{
        die("<p>Erreur dans l'execution de la requete. </p>");
   }
    mysqli_close($link);
?>
</body>

</html>