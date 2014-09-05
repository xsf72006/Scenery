<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-4
 * Time: 下午5:07
 */ ?>
<div class="row">
    <h3 class="text-center">
        <?=$news['title']?>
    </h3>
    <p class="text-center small"><?=$this->lang->line('newsauthor').':'.$news['author'].'   '.$this->lang->line('newsdate').':'.$news['ndate']?></p>
    <hr>
    <?php
    if (!empty($news['img'])):
    ?>
    <div class="text-center">
        <img src="<?=base_url()?>/uploads/news/<?=$news['img']?>" width="300px" height="300px"/>
    </div>
    <br>
    <?php
    endif;
    ?>
    <div class="col-md-offset-2 col-md-8">
        <p><?=$news['content']?></p>
    </div>
</div>