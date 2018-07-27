<?php $title = 'écrire ouverture'; ?>
<?php ob_start(); ?>


<h4><?php echo $nomtype; ?></h4>
<form>
    <input type="hidden" name="action" value="ecrireOuverture" />
    <input type="hidden" name="type" value="<?php echo $idType; ?>" />
    <label>Ouverture</label>
    <input type="text" name="ouverture" required /><br />
    <input type="submit" value="Ok" />
</form>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>