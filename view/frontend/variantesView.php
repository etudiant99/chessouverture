<?php $title = 'Variantes'; ?>
<?php ob_start(); ?>

<form class="agauche">
    <input type="hidden"   name="action"  value="nouvellevariante" />
    <input type="hidden"   name="ouverture"  value="<?php echo $_GET['id'] ?>" />
    <button name="nouvellevariante" value="yes">Ajouter variante</button>
</form>

<h1><?= $ouverture->getOuverture(); ?></h1>
<h4><?= $ouverture->getType(); ?></h4>
<br />

<div class="container">
<div class="row">
<div class="col-sm-4">
    <br />
    <h6><a href="?action=echiquier&id=<?php echo $idOuverture; ?>">Coups de base</a></h6>
    <table class="normale">
        <tr><th></th><th>Blancs</th><th>Noirs</th></tr>
        <?php
        $compteur = 0;
        foreach ($coupsouverture as $coup)
        {
            $coup = explode(" ",$coup);
            $coupBlanc = $coup[0];
            if (isset($coup[1]))
                $coupNoir = $coup[1];
            else
                $coupNoir = '';
            $compteur++;
            ?>
            <tr class="normale">
                <td class="normale"><?= $compteur ?></td>
                <td class="normale"><?= $coupBlanc ?></td>
                <td class="normale"><?= $coupNoir ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<br />
<?php
if ($variantes != null)
{
    foreach ($variantes as $variante)
    {
        ?>
        <div class="col-sm-4">
            <br />
            <h6><a href="?action=coupvariante&id=<?php echo $variante->getId(); ?>"><?= $variante->getVariante() ?></a><a href="?action=variantes&id=<?php echo $_GET['id'] ?>&but=effacer&variante=<?php echo $variante->getId(); ?>"onclick="if(!confirm('Voulez-vous vraiment effacer  <?php echo $variante->getVariante() ?> ?')) return false;"><img src="public/images/effacer.png" width="20" height="15" /></a></h6>
            <?php
            $coups = $variante->getListecoups();
            $compteur = 0;
            if ($coups != null)
            {
            ?>
            <table class="normale">
                <tr><th></th><th>Blancs</th><th>Noirs</th></tr>
            <?php
            foreach ($coups as $coup)
            {
                $compteur++;
                if (strlen($coup) > 6 )
                    $coups = explode(" ",$coup);
                else
                    $coups = null;
                ?>
                <tr class="normale">
                    <td class="normale"><?= $compteur ?></td>
                    <td class="normale"><?php if (!isset($coups)) echo $coup; else echo $coups[0]; ?></td>
                    <td class="normale"><?php if (isset($coups[1])) echo $coups[1]; ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>
        <br />
        <?php
        }
    }
}
?>

</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>