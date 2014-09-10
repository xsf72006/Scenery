<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:57
 */ -->

<div class="row">
    <?=form_open('scenery/index', array('class'=>'form-horizontal', 'role'=>'form'))?>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-2">
            <input type="text" class="form-control" name="sname" placeholder="<?=$this->lang->line('sceneryname')?>">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="category" placeholder="<?=$this->lang->line('category')?>">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="position" placeholder="<?=$this->lang->line('position')?>">
        </div>
    </div>
    <div class="form-group">
        <!--
        <div class="col-sm-offset-3 col-sm-2">
            <input type="text" class="form-control" placeholder="<?=$this->lang->line('area')?>">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" placeholder="<?=$this->lang->line('traffic')?>">
        </div>
        -->
        <div class="col-sm-offset-3 col-sm-2">
            <input type="text" class="form-control" name="bus" placeholder="<?=$this->lang->line('bus')?>">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary"><?=$this->lang->line('scenerysearch')?></button>
        </div>
    </div>
    </form>
</div>
<hr>
<div class="row">
    <h3 class="text-center"><?=$this->lang->line('scenerylist')?></h3>
    <div class="list-group col-md-offset-3 col-md-6">
        <?php
            foreach ($scenery as $row)
                echo anchor('scenery/show/'.$row['id'], $row['sname'], array('class' => 'list-group-item', 'target' => '_blank'));
        ?>
    </div>
</div>