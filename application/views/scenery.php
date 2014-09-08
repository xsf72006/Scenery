<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:57
 */ -->

<div class="row">
    <div class="list-group col-md-offset-3 col-md-6">
        <?php
            foreach ($scenery as $row)
                echo anchor('scenery/show/'.$row['id'], $row['sname'], array('class' => 'list-group-item', 'target' => '_blank'));
        ?>
    </div>
</div>