<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:56
 */ -->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->lang->line('title')?></title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Navigator -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span><?=$this->lang->line('title')?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if ($active == "scenery") echo 'class = "active"'; ?>><?=anchor('scenery',$this->lang->line('overview'));?></li>
                    <li <?php if ($active == "news") echo 'class = "active"'; ?>><?=anchor('news',$this->lang->line('news'))?></li>
                    <li <?php if ($active == "statistic") echo 'class = "active"'; ?>><?=anchor('statistic',$this->lang->line('statistic'))?></li>
                    <?php
                    if ($this->session->userdata('is_admin') === TRUE):
                    ?>
                        <li class="dropdown <?php if ($active == "admin") echo 'active'; ?>">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><?=$this->lang->line('admin')?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                if ($this->session->userdata('is_superadmin') === TRUE):
                                ?>
                                <li><?=anchor("admin/user", $this->lang->line('user_admin'))?></li>
                                <?php
                                endif;
                                ?>
                                <li><?=anchor("admin/scenery", $this->lang->line('scenery_admin'))?></li>
                                <li><?=anchor("admin/category", $this->lang->line('category_admin'))?></li>
                                <li><?=anchor("admin/news", $this->lang->line('news_admin'))?></li>
                            </ul>
                        </li>
                    <?php
                    endif;
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text"><?=$this->lang->line('welcome').anchor("main/login", $this->session->userdata('username'))?>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!--    <!-- Modal -->
<!--    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                --><?//=form_open('/', array('class' => 'form-horizontal',
//                                        'role' => 'form'))?>
<!--                <div class="modal-header">-->
<!--                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
<!--                    <h4 class="modal-title" id="myModalLabel">--><?//=$this->lang->line('login');?><!--</h4>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <div class="form-group">-->
<!--                        <label for="inputName" class="col-sm-5 control-label">--><?//=$this->lang->line('username')?><!--</label>-->
<!--                        <div class="col-sm-4">-->
<!--                            <input type="text" class="form-control" name="username">--><?//=form_error('username')?>
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="inputPassword" class="col-sm-5 control-label">--><?//=$this->lang->line('password')?><!--</label>-->
<!--                        <div class="col-sm-4">-->
<!--                            <input type="password" class="form-control" name="passwd">--><?//=form_error('password')?>
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <div class="col-sm-offset-5 col-sm-4">-->
<!--                            <div class="checkbox">-->
<!--                                <label>-->
<!--                                    <input type="checkbox" name="remember" value="1">--><?//=$this->lang->line('remember')?>
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">--><?//=$this->lang->line('cancel');?><!--</button>-->
<!--                    <button type="submit" class="btn btn-primary" name="submit">--><?//=$this->lang->line('login');?><!--</button>-->
<!--                </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->