<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:57
 */ -->

<div class="container">
    <br><br><br><br><br><br><br>
    <div class="row">
        <?php
        echo form_open('main/login/'.$active, array('class'=>'form-horizontal', 'role'=>'form')); ?>
        <div class="form-group">
            <label for="inputName" class="col-sm-4 control-label"><?=$this->lang->line('username');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="username" value="<?=set_value('username')?>">
                <?=form_error('username')?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPsw" class="col-sm-4 control-label"><?=$this->lang->line('password');?></label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" value="<?=set_value('password')?>">
                <?=form_error('password')?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" value="1"><?=$this->lang->line('remember');?>
                    </label>
                </div>
            </div>
        </div>
        <?php
        if ($logerror == TRUE):
            ?>
            <div class="form-group">
                <span class="col-sm-offset-4 col-sm-4 alert alert-danger" role="alert"><?=$this->lang->line('logerror');?></span>
            </div>
        <?php
        endif;
        ?>
        <div class="form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit"><?=$this->lang->line('login');?></button>
            </div>
        </div>
        </form>
    </div>

</div>
