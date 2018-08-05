<?php $title = 'Ouvertures'; ?>
<?php ob_start(); ?>

<?php
if ($_SESSION['admin'])
{
    ?>
    <form>
        <input type="hidden"   name="action"  value="nouvelleouverture" />
        <input type="hidden"   name="type"  value="<?php echo $_GET['type']; ?>" />
        <button class="agauche" name="nouvelle" value="yes">Ajouter ouverture</button>
    </form>
<?php
}
?>

<h1><?php echo $type->getType(); ?></h1>

<div class="decompte">
    <table>
        <?php
        foreach ($lesouvertures as $item)
        {
            ?>
            <tr>
                <td class="agauche"><li><a href="<?php echo '?action=variantes&id='.$item['id']; ?>"><?php echo $item['ouverture']; ?></a></li></td>
                <?php
                if ($_SESSION['admin'])
                {
                    ?>
                    <td><a href="?action=ouvertures&but=effacer&type=<?php echo $idType; ?>&item=<?php echo $item['id'] ?>"onclick="if(!confirm('Voulez-vous vraiment effacer  <?php echo $item['ouverture'] ?> ?')) return false;"><img src="public/images/effacer.png" width="20" height="15" /></a></td>
                <?php } ?>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php $content = ob_get_clean(); ?>
<?php
    if (isset($_SESSION['uid']))
        require('template.php');
    else
        require('starttemplate.php');
    
?>