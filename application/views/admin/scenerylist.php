<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-3
 * Time: 下午4:02
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix vleft" id="sidebar">
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
                <td><?=$i?></td>
                <td><?=anchor('scenery/show/'.$row['id'], $row['sname'], array('target' => '_blank'))?></td>
                <td><?=anchor('scenery/delete/'.$row['id'], $this->lang->line('delete'), array('onclick' => "return confirm('".$this->lang->line('confirmdelete')."')"))?></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>