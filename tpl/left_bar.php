<?php
/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 16.04.2017
 * Time: 17:30
 */
?>

<div class="quick-bg">
    <div id="spacer"  style="margin-bottom:15px;">
        <div id="rc-bg">Menu</div>
    </div>';

    <?php foreach($left_bar as $row): ?>
    <div class='quick-links'>
        » <a href='?option=category&id_cat=<?php echo $row['id']; ?>'><?php echo $row['name_category']; ?></a>
    </div>
    <?php endforeach;?>
</div>