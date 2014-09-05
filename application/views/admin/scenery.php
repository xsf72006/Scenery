<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:56
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix" id="sidebar">
        <?=anchor("admin/scenery", $this->lang->line('addscenery'), array('class' => "list-group-item list-group-item-info"))?>
        <?=anchor("admin/scenerylist", $this->lang->line('scenerylist'), array('class' => "list-group-item"))?>
    </div>
</div>

<!-- Main -->
<div class="col-md-9">
    <hr>
    <?php
    echo form_open_multipart('admin/scenery', array('class'=>'form-horizontal', 'role'=>'form')); ?>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('sceneryname')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="sname">
            <?=form_error('sname')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('summary')?></label>
        <div class="col-sm-6">
            <textarea class="form-control" name="summary" rows="10"></textarea>
            <?=form_error('summary')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('sceneryimg')?></label>
        <div class="col-sm-4">
            <input type="file" name="img">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('category')?></label>
        <div class="col-sm-4">
            <?=$category?>
            <?=form_error('category')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('area')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="area">
            <?=form_error('area')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('traffic')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="traffic">
            <?=form_error('traffic')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('position')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="position">
            <?=form_error('position')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('bus')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="bus">
            <?=form_error('bus')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('subscenery')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="subscenery">
            <?=form_error('subscenery')?>
        </div>
    </div>
    <div class="form-group text-center">
        <?=anchor('admin/scenery', $this->lang->line('reset'), array('class' => 'btn btn-info'))?>
        <button type="submit" class="btn btn-primary"><?=$this->lang->line('addscenery')?></button>
    </div>
    </form>
</div>