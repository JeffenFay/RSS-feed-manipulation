<?php
$url = 'https://www.lequipe.fr/rss/actu_rss_Auto-Moto.xml';
$rss = simplexml_load_file($url);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>L'équipe - Flux RSS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,800" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                foreach ($rss->channel->item as $item) {
                    $datetime = date_create($item->pubDate);
                    $date = date_format($datetime, 'd M Y, H\hi');
                    $description = $item->description;
                    $enclosure = $item->enclosure->attributes()['url'];// variable qui contient l'url de l'image extrait grâce à la fonction attributes, dans la balise enclosure
                    $link = $item->link;
                    $title = $item->title;
                    ?>
                    <div class="col-sm-6">
                        <div class="card text-center mb-3" >
                            <img class="card-img-top" src="<?= $enclosure ?>" alt="<?= $title ?>">
                            <div class="card-header">
                                <a href="<?= $link ?>">
                                    <div class="card-title" id="title"><?= $title ?></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= $description ?></p>
                                <span>(<?= $date ?>)</span>
                            </div>
                            <div class="card-footer">
                                <a href="<?= $link ?>" class="btn btn-primary">Lire la suite...</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>