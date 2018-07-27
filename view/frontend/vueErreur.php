<?php $title = 'Erreur'; ?>

<p><?= $msgErreur ?></p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>