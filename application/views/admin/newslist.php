<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-4
 * Time: 下午2:07
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix" id="sidebar">
        <?=anchor("admin/news", $this->lang->line('addnews'), array('class' => "list-group-item"))?>
        <?=anchor("admin/newslist", $this->lang->line('newslist'), array('class' => "list-group-item list-group-item-info"))?>
    </div>
</div>

<!-- Main -->
<div class="col-md-9">
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="width: 10%">#</th>
            <th><?=$this->lang->line('newstitle');?></th>
            <th><?=$this->lang->line('manage');?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($news as $row):
            $i++;
            ?>
            <tr>
                <td style="width: 10%"><?=$i?></td>
                <td><?=$row['title']?></td>
                <td><?=$this->lang->line('delete');?></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>