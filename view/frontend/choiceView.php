<?php $title = 'Ouvertures'; ?>
<?php ob_start(); ?>

<div class="titreveritable">
    Choix type ouverture
</div>
<br /><br />

<form method="get">
    <input type="hidden" name="action" value="ouvertures" />
    <select name="type">
        <?php foreach ($types as $type): ?>
            <option value="<?php echo $type->getId(); ?>"><?php echo $type->getType(); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Ok" />
</form>

<?php $content = ob_get_clean(); ?>
<?php
    if (isset($_SESSION['uid']))
        require('template.php');
    else
        require('starttemplate.php');
    
?>