<?php
$db = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=nguyen","nguyen","nguyenphpmyadmin");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER); 
/* tous les attributs dans les tableaux associatifs 
 * seront en minuscules */
?>