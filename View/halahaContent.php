<h1> <strong><?php echo $halaha['titre'] ?></strong></h1>
<div class="container"><?php echo'<img src="public/images/'.$halaha['image'].'">' ?></div>

<p><?php  echo $halaha['contenu'] ?> </p>
<button id="nextHalaha" data-id="<?php echo $halaha['id'] ?>">Trouve moi une autre Halaha</button>
