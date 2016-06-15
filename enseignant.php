<?php
class Enseignant {
	private $id;
	private $nom;
	private $prenom;
  private $email;
  private $bureau;
  
  function __construct($id,$nom,$prenom,$email,$bureau){
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->bureau = $bureau;
  }
  
  public function getNom(){
    return $this->nom;
  }
  
  public function getPrenom(){
    return $this->prenom;
  }
  
    public function getBureau(){
    return $this->bureau;
  }
  
  public function setNom($nom){
    $this->nom = $nom;
  }
  
  public function setPrenom($prenom){
    $this->prenom = $prenom;
  }
  
  function __toString(){
    return "id = ".$this->id." nom = ".$this->nom." prenom = ".$this->prenom;
  }
  
  public function partageLeBureau($prof){
        if(get_class() == get_class($prof)){
          if($this->getBureau() == $prof->getBureau()){
             echo("Vous partagez bien le meme bureau");
            return true;
          }
          else{
            echo("Vous ne partagez pas le meme bureau");
            return false;
          }
        }
    else{
      echo("Votre parametre n'est pas une instance de la classe Enseignante");
      return false;
    }
  }
  
}
$personnage = new Enseignant(1,"Nguyen","Alex","alexnguyen688@gmail.com","114");
$prof = new Enseignant(2,"Nguyen","Alex","alexnguyen688@gmail.com","113");
$personnage->partageLeBureau($prof);
?>