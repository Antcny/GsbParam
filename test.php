<!-- Test des méthodes de ModeleFront -->

<?php

require_once('./modele/ModeleFront.php');

$m1 = new ModeleFront;
$m2 =  new ModeleFront;
$res= $m1->getLesCategories();
$req =$m2->getLesProduitsDeCategorie("CH");
var_dump($req);
var_dump($res);
?>