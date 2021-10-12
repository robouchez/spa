<?php 
require ROOT."/templates/headerView.php";
?>

<div class="container p-2">
    <div class="row">
        <img src="https://fakeimg.pl/286x180/?text=<?php echo $animal->getName() ?>" class="col-6" alt="image produit">
        <div class="col-6">
                <p>Nom de l'animal : <?php echo $animal->getName() ?></p>
                <p>Espèce de l'animal : <?php echo $animal->getSpecies() ?></p>           
                <p>Race de l'animal : <?php echo $animal->getBreed() ?></p>           
                <p>Couleur de l'animal : <?php echo $animal->getColour() ?></p>           
            <div class="col-12">
                <a href="/spa/public/?page=deleteAnimal&id=<?php echo $animal->getId() ?>" class="btn btn-danger">Retirer cet animal</a>
                <a href="/spa/public/?page=updateAnimal&id=<?php echo $animal->getId() ?>" class="btn btn-secondary">Modifier la fiche de l'animal</a>
            </div>
        </div>
    </div>
    <hr>

    <?php if ($animal->getBooked() == false) { ?>
        <a href="/spa/public/?page=bookAnimal&id=<?php echo $animal->getId() ?>" class="btn btn-secondary">Réserver</a>
    <?php } else { ?>
        <p>Réservé</p>
    <?php } ?>
    
</body>
</html>