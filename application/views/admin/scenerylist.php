<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-3
 * Time: 下午4:02
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix" id="sidebar">
        <?=anchor("admin/scenery", $this->lang->line('addscenery'), array('class' => "list-group-item"))?>
        <?=anchor("admin/scenerylist", $this->lang->line('scenerylist'), array('class' => "list-group-item list-group-item-info"))?>
    </div>
</div>

<div class="col-md-9">
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="width: 10%">#</th>
            <th><?=$this->lang->line('sceneryname');?></th>
            <th><?=$this->lang->line('category');?></th>
            <th><?=$this->lang->line('manage');?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($scenery as $row):
            $i++;
            ?>
            <tr>
                <td style="width: 10%"><?=$i?></td>
                <td><?=$row['sname']?></td>
                <td><?=$row['category']?></td>
                <td><?=$this->lang->line('edit').' '.$this->lang->line('delete');?></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>