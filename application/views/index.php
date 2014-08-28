<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:57
 */ -->

<div class="container">
    <div id="carousel-scenery-generic" class="carousel slide row" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-scenery-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-scenery-generic" data-slide-to="1"></li>
            <li data-target="#carousel-scenery-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" style="width: 100%">
            <div class="item active">
                <img src="<?=base_url()?>img/1.jpg" alt="First Thumbnail label" style="width: 100%; max-height: 500px !important;">
                <div class="carousel-caption">
                    <h3>First Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
            <div class="item">
                <img src="<?=base_url()?>img/2.jpg" alt="Second Thumbnail label" style="width: 100%; max-height: 500px !important;">
                <div class="carousel-caption">
                    <h3>Second Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
            <div class="item">
                <img src="<?=base_url()?>img/3.jpg" alt="Third Thumbnail label" style="width: 100%; max-height: 500px !important;">
                <div class="carousel-caption">
                    <h3>Third Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-scenery-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-scenery-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    新闻与公告
                </div>
                <div class="panel-body">
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?>
                </div>
                <div class="panel-footer text-right">
                    <?=anchor('news','更多');?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    热门景点
                </div>
                <div class="panel-body">
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?><br>
                    <?=anchor('/', "测试")?>
                </div>
                <div class="panel-footer text-right">
                    <?=anchor('scenery','更多');?>
                </div>
            </div>
        </div>
    </div>
</div>