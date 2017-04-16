<?php
/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 16.04.2017
 * Time: 17:40
 */
?>

<div id="mainarea">
    <div class="heading">
        <div class="toplinks" style="padding-left:30px;">
            <a href="?option=main">Главная</a>
        </div>

        <?php foreach ($menu_top as $item): ?>
        <div class="sap2">::</div>
        <div class="toplinks">
            <a href="?option=menu&id=<?php echo $item['id']; ?>"><?php echo $item['name_menu']; ?></a>
        </div>
        <?php endforeach;?>
</div>