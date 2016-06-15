<!DOCTYPE html>
<html>
 
	<head>
		<meta charset="UTF-8">
		<title>Profs</title>
	</head>
 
	<body>
	
	<?php
		
		$link=mysqli_connect("dwarves.iut-fbleau.fr", "nguyen", "nguyenphpmyadmin", "nguyen");
			if(!$link){
				die("<p>connexion impossible</p>");
			}
        
		echo "<h1>Ajouter un enseignant</h1>";
    
    
		echo "<form method='GET' action='ajouter.php'>"; 
		echo "Nom : ";
		echo "<input type='text' name='nom'><br><br>";
		echo "Prenom : ";
		echo "<input type='text' name='prenom'><br><br>";
		echo "Email : ";
		echo "<input type='text' name='email'><br><br>";
    echo "Bureau : ";
		echo "<input type='text' name='bureau'><br><br>";
		echo "<input type='submit' value='Insérer'><br><br>";
		echo "</form>";
    
		extract($_GET);
		if(isset($nom) && ($prenom) && ($email) && ($bureau)){
		$query = "INSERT INTO Enseignant(nom,prenom,email,bureau) VALUES (?,?,?,?)";
		$stmt = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($stmt, "sssi", $nom, $prenom, $email, $bureau);
		mysqli_stmt_execute($stmt);
		echo "INSERT INTO Enseignant(nom,prenom,email,bureau) Values ($nom, $prenom, $email, $bureau)";
		}
	
	?>
	
	
	</body>
</html>