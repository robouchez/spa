<?php

require ROOT."/templates/headerView.php";

?>

<div class="container">
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4" style="background-color: #f8f9fa;">
            <h1 class="display-4 py-2 text-truncate">
                <?php if ($_GET["page"] == "updateAnimal"){
                        echo 'Modifier un animal';
                    } else {
                        echo 'Ajouter un animal';
                    }
                ?>
            </h1>
            <div class="px-2" >
                <form action="" class="form justify-content-center" method="POST">
                    <div class="form-group">
                        <label for="title" class="form-label">Nom de l'animal :</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?=isset($animal)?$animal->getName():''?>">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Espèce de l'animal :</label>
                        <input type="text" class="form-control" name="species" id="species" value="<?=isset($animal)?$animal->getSpecies():''?>">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Race de l'animal :</label>
                        <input type="text" class="form-control" name="breed" id="breed" value="<?=isset($animal)?$animal->getBreed():''?>">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Couleur de l'animal :</label>
                        <input type="text" class="form-control" name="colour" id="colour" value="<?=isset($animal)?$animal->getColour():''?>">
                    </div>
                        <button style="margin-top: 10px;" class="btn btn-secondary">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
      