<div class="alert alert-light" role="alert" id="panier">Votre panier :</div>
<div id="produits">
<?php
foreach( $lesProduitsDuPanier as $unProduit) 
{
	// récupération des données d'un produit
	$id = $unProduit->id;
	$description = $unProduit->description;
	$image = $unProduit->image;
	$prix = $unProduit->prix;
	// affichage
	?>
	<div id="card">
		<div>
			<div class="photoCard"><img src="<?= $image ?>" alt="image descriptive" /></div>
				<div class="descrCard"><?= $description ?></div>
				<div class="prixCard"><b><?= $prix."€" ?><b></div>
				<br>
				<div class="div-btn">
					<div><input class="btn btn-dark" type="button" value="-" onclick="QuantiteMoinsClick();"/></div>
					<!-- <span id="score" >0</span> -->
					<input id="score" type="texte" value ="1" min="0" max="10">
					<div><input class="btn btn-dark" type="button" value="+" onclick="QuantitePlusClick();"/></div>
				</div>
			</div>
			<div class="imgCard"><a href="index.php?uc=gererPanier&produit=<?= $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
				<img src="assets/images/retirerpanier.png" title="Retirer du panier" alt="retirer du panier"></a>
			</div>
	</div>
	
	<div>
		<div id="box-achat">
			<h2>Récapitulatif </h2>
			<br>
			<br>
			<h5>Total : <?php echo $prix."€"?></h5>
			<br>
			<br>
			<div class="contenuCentre">
				<a href="index.php?uc=gererPanier&action=passerCommande"><button type="button" class="btn btn-primary">Commander</button></a>
			</div>
		</div>
	</div>
	
	<?php
}
?>
</div>
</div>

<script>
var score = 0;
function QuantiteMoinsClick(){
   score--;
   document.getElementById("score").innerHTML = score;
}
</script>

<script>
var score = 0;
function QuantitePlusClick(){
   score++;
   document.getElementById("score").innerHTML = score;
}
</script>


