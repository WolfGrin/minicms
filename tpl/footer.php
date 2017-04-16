<?php
/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 16.04.2017
 * Time: 17:55
 */
?>
            <div id="bottom">
                <div class="toplinks" style="padding-left:127px;"><a href="?option=main">Главная</a></div>
                <?php foreach ($footer as $item): ?>
                <div class="sap2">::</div>
                <div class="toplinks">
                    <a href="?option=menu&id=<?php echo $item['id'];?>"><?php echo $item['name_menu'];?></a>
                </div>
                <?php endforeach;?>
            </div>
            <div class="copy">
                <span class="style1"> Copyright 2017 Название сайта </span>
            </div>
        </center>
    </body>
</html>
