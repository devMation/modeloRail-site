<?php
require '../Boostrap/boostrap.php';
require '../display/trait.php';
require '../components/card-locomo.html.php';
?>

<head>
    <link rel="stylesheet" href="../display/style.css">
    <link rel="stylesheet" href="../font/font.css">
</head>
<style>
h1 {
    font-family: "Kenia-Regular";
}

h3 {
    font-family: "LaBelleAurore-Regular";
}

h5 {
    font-family: "Kenia-Regular";
}

a {
    font-family: "JosefinSans-Italic-VariableFont_wght";
}

.header-bg {
    background: url('../pictures/bg.jpeg') center/cover;
    min-height: 100vh;

}

#presentation {
    background: url('../pictures/presentation.jpeg') center/cover;
    min-height: 80vh;
    opacity: 0.9;
}







header h1 {
    padding: 100px;
    text-align: center;
    font-size: 10rem;
    letter-spacing: 1px;
    font-weight: 700;
    color: white;
    text-shadow: 3px -4px 1px rgba(206, 206, 206, 0.5);

}

header h3 {
    font-size: 3rem;
    letter-spacing: 1px;
    font-weight: 700;
    color: white;
    text-align: center;
    text-shadow: 4px 1px 4px rgba(206, 206, 206, 0.95);
    font-family: "LaBelleAurore-Regular";
}

#presentation p {
    text-align: center;
    font-size: 1.5rem;
    width: 80%;
    margin: 0 auto;
    padding: 200px;
    color: white;
    line-height: 3;

}

.card {
    position: relative;
    padding: 20px;
    margin-top: 20px;
    background-color: lightgray;

    /* Couleur de fond pour mieux visualiser */
    border: 2px solid #333;
    /* Bordure extérieure épaisse pour le rail */
    border-radius: 5px;
    /* Pour adoucir les coins */
    box-shadow: inset 0 0 0 5px white,
        /* Rail intérieur blanc*/
        inset 0 0 0 10px #666;
    /* Rail intérieur gris */
}

.card::before {


    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 3px dashed #333;
    /* Pour que le contenu puisse être cliqué */
}

.clip-path {
    position: relative;
    padding: 20px;
}

.clip-path::before {
    box-shadow: 5px 0 10px black;
    opacity: 0.21;
    content: '';
    position: absolute;
    top: 0;
    left: 0;

    width: 100%;
    height: 100%;
    background-color: #444444;

    /* Couleur d'arrière-plan du clip path */
    clip-path: polygon(100% 0, 0 0, 0 66%);
    /* Définition du clip path */
    z-index: -1;
    /* Assurer que le clip path est en arrière-plan */
}

.card-img-top {
    border-radius: 20%;
}

/* Media Queries */
@media (max-width: 1200px) {
    header h1 {
        font-size: 8rem;
    }

    header h3 {
        font-size: 2.5rem;
    }

    #presentation p {
        padding: 150px;
    }

    .card {
        width: 100%;
        margin: 10px 0;
    }
}

@media (max-width: 768px) {
    header h1 {
        font-size: 6rem;
        padding: 50px;
    }

    header h3 {
        font-size: 2rem;
    }

    #presentation p {
        font-size: 1.2rem;
        padding: 100px;
    }

    .card {
        width: 100%;
        margin: 10px 0;
    }
}

@media (max-width: 576px) {
    header h1 {
        font-size: 4rem;
        padding: 20px;
    }

    header h3 {
        font-size: 1.5rem;
    }

    #presentation p {
        font-size: 1rem;
        padding: 50px;
    }

    .card {
        width: 100%;
        margin: 10px 0;
    }
}

.card {
    transition: transform 0.3s ease-in-out;
    border-radius: 15px;
    position: relative;
}
</style>
<!-- A voir demain animation js css-->

<body>
    <header class="header-bg">
        <?= require '../Boostrap/headerNav.php' ?>
        <h1>ModeloRail</h1>
        <h3>La passion du train</h3>
    </header>
    <section id="presentation">
        <p>Salut les mécanos ! Moi, c'est Amine, un jeune passionné de maquettes ferroviaires et de tout ce qui touche
            aux trains. J'ai créé ce site pour vous permettre d'acheter mes maquettes de collection et de partager avec
            vous ma passion pour le monde ferroviaire.</p>
    </section>
    <div class="clip-path">
        <div id="banderole"></div>
        <h3 class="text-center m-3">Voici Nos Maquette</h3>
        <div id="container" class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($articles as $article) : ?>
            <div class="col">
                <div class="card h-100 border-0 train-card">
                    <div class="train-top"></div> <!-- Partie haute du wagon -->
                    <div class="card-body train-middle">
                        <img src="<?= htmlspecialchars($article['image']) ?>" class="card-img-top"
                            alt="<?= htmlspecialchars($article['nom']) ?>">
                        <h5 class="card-title text-center mt-3"><?= htmlspecialchars($article['nom']) ?></h5>
                        <p class="card-text text-center"><?= htmlspecialchars($article['prix']) ?> €</p>
                        <div class="text-center">
                            <a href="../DetailArticles/detail.php?id=<?= htmlspecialchars($article['id']) ?>"
                                class="btn btn-warning btn-sm mb-2">Détail</a>
                        </div>
                        <form action="../AjoutPanier/Ajout.php" method="POST" class="m-3">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($article['nom']) ?>">
                            <input type="hidden" name="price" value="<?= htmlspecialchars($article['prix']) ?>">
                            <div class="input-group mb-3">
                                <button class="btn btn-warning btn-minus" type="button">-</button>
                                <input type="text" name="quantity" class="form-control text-center quantity-input"
                                    value="1">
                                <button class="btn btn-warning btn-plus" type="button">+</button>
                            </div>
                            <button type="submit" class="btn btn-warning btn-block">Ajouter au panier</button>
                        </form>
                    </div>
                    <div class="train-bottom"></div> <!-- Partie basse du wagon -->
                </div>
            </div>
            <?php endforeach; ?>
        </div>



    </div>
</body>
<?php
require '../Boostrap/footerAccueil.php';
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-minus').forEach(function(button) {
        button.addEventListener('click', function() {
            var input = this.parentElement.parentElement.querySelector('.quantity-input');
            var value = parseInt(input.value) || 0;
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });

    document.querySelectorAll('.btn-plus').forEach(function(button) {
        button.addEventListener('click', function() {
            var input = this.parentElement.parentElement.querySelector('.quantity-input');
            var value = parseInt(input.value) || 0;
            input.value = value + 1;
        });
    });
});
</script>