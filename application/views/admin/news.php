<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-2
 * Time: 下午10:09
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix vleft" id="sidebar">
        <?=anchor("admin/news", $this->lang->line('addnews'), array('class' => "list-group-item list-group-item-info"))?>
        <?=anchor("admin/newslist", $this->lang->line('newslist'), array('class' => "list-group-item"))?>
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
    echo form_open_multipart('admin/news', array('class'=>'form-horizontal', 'role'=>'form')); ?>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('newstitle')?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="title">
            <?=form_error('title')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('newscategory')?></label>
        <div class="col-sm-4">
            <label>
                <input type="radio" name="category" value="0">
                <?=$this->lang->line('snews')?>
            </label>
            <label>
                <input type="radio" name="category" value="1">
                <?=$this->lang->line('public')?>
            </label>
            <?=form_error('category')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('newsimg')?></label>
        <div class="col-sm-4">
            <input type="file" name="img">
            <?=form_error('img')?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label"><?=$this->lang->line('newscontent')?></label>
        <div class="col-sm-6">
            <textarea class="form-control" name="content" rows="10"></textarea>
            <?=form_error('content')?>
        </div>
    </div>
    <div class="form-group text-center">
        <?=anchor('admin/news', $this->lang->line('reset'), array('class' => 'btn btn-info'))?>
        <button type="submit" class="btn btn-primary"><?=$this->lang->line('addnews')?></button>
    </div>
    </form>
</div>