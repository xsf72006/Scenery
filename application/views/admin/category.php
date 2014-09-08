<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-5
 * Time: 下午10:37
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix vleft" id="sidebar">
        <?=anchor("admin/category", $this->lang->line('category_admin'), array('class' => "list-group-item list-group-item-info"))?>
    </div>
</div>

<!-- Main -->
<div class="col-md-9">
    <div class="row">
        <?php
        if ($adderror == TRUE):
            ?>
            <span class="col-sm-4 alert alert-danger" role="alert"><?=$this->lang->line('adderror');?></span>
        <?php
        endif;
        if ($addsuccess == TRUE):
            ?>
            <span class="col-sm-4 alert alert-success" role="alert"><?=$this->lang->line('addsuccess');?></span>
        <?php
        endif;
        ?>
    </div>
    <hr>
    <?php
    echo form_open_multipart('admin/category', array('class'=>'form-horizontal', 'role'=>'form')); ?>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('cname')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="cname">
            <?=form_error('cname')?>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('parentc')?></label>
        <div class="col-sm-4">
            <select class="form-control" name="fid">
                <option value="0"><?=$this->lang->line('none')?></option>
                <?php
                foreach ($category as $row)
                {
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group text-center">
        <?=anchor('admin/category', $this->lang->line('reset'), array('class' => 'btn btn-info'))?>
        <button type="submit" class="btn btn-primary"><?=$this->lang->line('addcategory')?></button>
    </div>
    </form>
    <hr>
    <div class="row col-md-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10%">#</th>
                <th style="width: 60%"><?=$this->lang->line('cname')?></th>
                <th><?=$this->lang->line('manage')?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($category as $row)
            {
                $i++;
                echo '<tr>';
                echo '<td>';
                echo $i;
                echo '</td>';
                echo '<td>';
                echo $row['name'];
                echo '</td>';
                echo '<td>';
                echo anchor('category/delete/'.$row['id'], $this->lang->line('delete'), array('onclick' => "return confirm('".$this->lang->line('deletecategory')."')"));
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>