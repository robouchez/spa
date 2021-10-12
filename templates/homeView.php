<?php

require "headerView.php";
?>

    <div class="container p-2">
        <div class="row d-flex justify-content-between">
            <h3 class="col-6">Derniers animaux:</h3>
            <a href="/spa/public/?page=addAnimal" class="col-2 btn btn-secondary">Ajouter un animal</a>
        </div>
        <hr>
        <div class="row">
            <?php foreach ($animals as $value): ?>
            <div class="card col-6" style="width: 18rem; margin: 20px;">
                <img class="card-img-top" src='https://fakeimg.pl/286x180/?text=<?php echo $value->getName() ?>' alt="Image animal">
                <div class="card-body">
                    <h5 class="card-title"><?= $value->getName() ?></h5>
                    <p class="card-text"><?= $value->getBooked() == false ? "Disponible" : "Réservé" ?></p>
                    <a href="/spa/public/?page=animal&id=<?php echo $value->getId() ?>" class="btn btn-secondary">Plus d'infos</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>