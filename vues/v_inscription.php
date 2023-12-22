<section class="bg-light">
    <div class="container">
        <div class="structure-hero pt-lg-5 pt-4">
            <h1 class="titre text-center">Formulaire d'inscription</h1>
            <p class="text text-center">Formulaire permettant l'inscription.</p>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5 py-3">
                <form class="form-signin formulaire m-auto" action="index.php?uc=gererinscription&action=inscrire" method="post">
                    <h2 class="form-signin-heading">S'inscrire</h2>
                    <input type="text" class="form-control" name="identifiant" placeholder="Identifiant" />
                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" />
                    <br>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" />
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" />
                    <input type="email" class="form-control" name="mail" placeholder="Mail" />
                    <br>
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" />
                    <input type="text" class="form-control" name="cp" placeholder="Code postale" />
                    <input type="text" class="form-control" name="ville" placeholder="Ville" />
                    
                    <br>
                    <input class="btn btn-lg btn-info btn-block text-light" type="submit" name="inscrire" value="S'inscrire">
                    
                </form>
            </div>
        </div>
    </div>
</section>
