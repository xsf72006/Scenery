<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:56
 */ ?>

<!-- SideBar -->
<div class="col-md-3">
    <div class="list-group affix vleft" id="sidebar">
        <?php
        $c1 = "list-group-item";
        $c2 = "list-group-item";
        if ($type == 1)
        {
            $c1 = "list-group-item list-group-item-info";
        }
        else
        {
            $c2 = "list-group-item list-group-item-info";
        }

        ?>
        <?=anchor("admin/user/1", $this->lang->line('admin_user'), array('class' => $c1))?>
        <?=anchor("admin/user/0", $this->lang->line('public_user'), array('class' => $c2))?>
    </div>
</div>

<!-- Main -->
<div class="col-md-9">
    <div class="row">
        <button class="btn btn-primary btn-lg col-sm-2" data-toggle="modal" data-target="#myModal">
            <?=$this->lang->line('add_user')?>
        </button>
        <?=form_error('username')?><?=form_error('password')?>
        <?php
        if ($adderror == TRUE):
            ?>
            <span class="col-sm-offset-1 col-sm-4 alert alert-danger" role="alert"><?=$this->lang->line('adderror');?></span>
        <?php
        endif;
        if ($addsuccess == TRUE):
            ?>
            <span class="col-sm-offset-1 col-sm-4 alert alert-success" role="alert"><?=$this->lang->line('addsuccess');?></span>
        <?php
        endif;
        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?=$this->lang->line('add_user')?></h4>
                </div>
                <?php
                echo form_open('admin/user/'.$type, array('class'=>'form-horizontal', 'role'=>'form')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label"><?=$this->lang->line('username');?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="username" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPsw" class="col-sm-4 control-label"><?=$this->lang->line('password');?></label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="set_admin" value="1"><?=$this->lang->line('set_admin');?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                    <button type="submit" class="btn btn-primary"><?=$this->lang->line('add_user')?></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th><?=$this->lang->line('username');?></th>
                    <th><?=$this->lang->line('manage')?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($user as $row):
                $i++;
            ?>
                <tr>
                    <td style="width: 10%"><?=$i?></td>
                    <td><?=$row['username']?></td>
                    <td><?=anchor('user/delete/'.$row['id'].'/'.$type, $this->lang->line('delete'), array('onclick' => "return confirm('".$this->lang->line('confirmdelete')."')"))?></td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>

