<?php
/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 16.04.2017
 * Time: 18:32
 */
?>


    <div id="main">
        <p class="heading2">Website Title!</p>
        <?php foreach ($content as $row): ?>
            <div style='margin: 10px 0 0 10px; border-bottom: 2px; solid-color: #c2c2c2'>
                <p style='font-size: 18px;'><?php echo $row['title']; ?></p>
                <p><?php echo $row['date']; ?></p>
                <p><img src='<?php echo $row['img_src']; ?>' width='150px' align='left' style='margin-right: 5px;'><?php echo $row['description']; ?></p>
                <p style='color: red;'><a href='?option=view&id=<?php echo $row['id'];?>'>Читать далее</a></p>
            </div><hr />
        <?php endforeach; ?>
    </div>
</div>
