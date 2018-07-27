<?php $title = 'écrire variante'; ?>
<?php ob_start(); ?>

<h4><?php echo $nomouverture; ?></h4>
<h5><?php echo '['.$typeouverture.']'; ?></h5>
<form>
    <input type="hidden" name="action" value="ecrireVariante" />
    <input type="hidden" name="ouverture" value="<?php echo $idOuverture; ?>" />
    <label>Variante</label>
    <input type="text" name="variante" required /><br />
    <input type="submit" value="Ok" />
</form>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>