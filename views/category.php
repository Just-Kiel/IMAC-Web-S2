<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    echo $datatab[0][0]['title'];
?>

<p>Sous catégories :</p>

<?php
    foreach ($datatab[1] as $subcategory) {
?>

<!-- TODO comment on fait pour les sous catégories ?? -->
<a href="#"><?php echo $subcategory['title']; ?></a>

<?php
    }
?>


<?php
  foreach ($datatab[2] as $key =>$goodplan) {
    if($key%2==0){
?>

  <div class="card mb-3" style="max-width: 70em;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src=
        <?php
          if(empty($goodplan['mediaID'])){
            echo "../views/img/cine.jpg";
          } else {
            echo "../views/".$goodplan['mediaID'];
          }
        ?>
        class="card-img invert img-fluid" alt="infos bon plan">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $goodplan['title']; ?></h5>
          <p class="card-text"><small class="text-muted">
            <?php
              $dateEtLieu = $goodplan['startingDate'];

              if(empty($goodplan['cityID'])){
                $dateEtLieu .= " en ligne";
            } else {
                $dateEtLieu .= " à : ".$goodplan['cityID'];
            }

              echo $dateEtLieu; 
            ?>
            </small></p>
          <p class="card-text"><?php echo $goodplan['textContent']; ?></p>
          <div class="pictos">
            <!-- TODO link vers section commentaire du bon plan -->
            <i class="bi bi-chat-dots-fill btn" href="#"></i>
              <!-- TODO like possible partout -->
              <i class="bi bi-heart-fill btn" href=""></i>
              <a href="../viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
          </div>
          <div class="proprio">
              <!-- link vers la pop up du profil  -->
              <!-- TODO link la photo de profil -->
              <a href=""><img src="../views/img/avatar1.png" alt="photo de profil" class="pp"></a>
              <h6><?php echo $goodplan['userID']['firstname']." ".$goodplan['userID']['lastname']; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
    } else {
?>

  <div class="card mb-3" style="max-width: 70em;">
    <div class="row no-gutters">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $goodplan['title']; ?></h5>
          <p class="card-text"><small class="text-muted">
            <?php
              $dateEtLieu = $goodplan['startingDate'];

              if(empty($goodplan['cityID'])){
                $dateEtLieu .= " en ligne";
            } else {
                $dateEtLieu .= " à : ".$goodplan['cityID'];
            }

              echo $dateEtLieu; 
            ?>
            </small></p>
          <p class="card-text"><?php echo $goodplan['textContent']; ?></p>
          <div class="pictos">
            <!-- TODO link vers section commentaire du bon plan -->
              <i class="bi bi-chat-dots-fill btn" href="#"></i>
              <!-- TODO like possible partout -->
              <i class="bi bi-heart-fill btn" href=""></i>
              <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
          </div>
          <div class="proprio">
              <!-- link vers la pop up du profil  -->
              <!-- TODO link la photo de profil -->
              <a href=""><img src="../views/img/avatar1.png" alt="photo de profil" class="pp"></a>
              <h6><?php echo $goodplan['userID']['firstname']." ".$goodplan['userID']['lastname']; ?></h6>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <img src=
        <?php
          if(empty($goodplan['mediaID'])){
            echo "../views/img/cine.jpg";
          } else {
            echo "../views/".$goodplan['mediaID'];
          }
        ?>
        class="card-img invert img-fluid" alt="infos bon plan">
      </div>
    </div>
  </div>

<?php
    }
  }
?>

</body>
</html>