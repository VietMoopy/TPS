<?php
    
    	$link=mysqli_connect("dwarves.iut-fbleau.fr", "nguyen", "nguyenphpmyadmin", "nguyen");
			if(!$link){
					die("<p>connexion impossible</p>");
			}
      $stmt = mysqli_prepare($link,"INSERT INTO Enseignant (nom,prenom,email,bureau) VALUES(?,?,?,?)");
      if(!$stmt){
         die ('pb');
      }
    $nom='Monnerat';
    $prenom='Denis';
    $email='monnerat@u-pec.fr';
    $bureau=114;
    mysqli_stmt_bind_param($stmt,"sssi",$nom,$prenom,$email,$bureau);
    mysqli_execute($stmt);
			?>