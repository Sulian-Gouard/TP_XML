<?php
//le fichier xml est au même niveau que le fichier PHP qui le manipule
$fichier = 'source.xml';
$contenu = simplexml_load_file($fichier);
$test = 0;

if (isset($_GET['page'])) {
    $test = intval($_GET['page']) - 1;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>

<body>

    <div class="navbar-fixed">
        <nav class="nav-wrapper shadow-custom bg-dark-gray">
            <div class="container">
                <a href="index.php" class="brand-logo">Site
                    PHP</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons saffron-text">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <?php foreach ($contenu as $partie) { ?>
                        <li><a href="index.php?page=<?= $partie['id'] ?>" class="saffron-text"><?= $partie->menu ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav bg-dark-gray" id="mobile-links">
        <?php foreach ($contenu as $partie) { ?>
            <li><a href="" class="saffron-text"><?= $partie->menu ?></a></li>
        <?php } ?>
    </ul>

    <h1 class="center"><?= $contenu->page[$test]->title ?></h1>
    <div class="center"><?= $contenu->page[$test]->content ?></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>