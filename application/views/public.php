<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:57
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix" id="sidebar">
        <?=anchor("news/index/0", $this->lang->line('snews'), array('class' => "list-group-item"))?>
        <?=anchor("news/index/1", $this->lang->line('public'), array('class' => "list-group-item list-group-item-info"))?>
    </div>
</div>

<!-- Main -->
<div class="col-md-9">
    <hr>
    <div class="list-group">
        <?php
        foreach ($news as $row)
            echo anchor('news/show/'.$row['id'], $row['title'], array('class' => 'list-group-item', 'target' => '_blank'))
        ?>
    </div>
</div>