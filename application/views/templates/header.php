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
    <style type="text/css">
        @media (min-width: 979px) {
            #sidebar.affix-top {
                position: static;
                margin-top:60px;
                width:228px;
            }

            #sidebar.affix {
                position: fixed;
                top:60px;
                width:228px;
            }
        }

        .affix,.affix-top {
            position:static;
        }
        body .col-md-9{
            padding-top: 60px;
            padding-bottom: 60px;
        }
    </style>
</head>
<body>
    <!-- Navigator -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                    <li <?php if (strpos($active, 'scenery') === 0) echo 'class = "active"'; ?>><?=anchor('scenery',$this->lang->line('overview'));?></li>
                    <li <?php if (strpos($active, 'news') === 0) echo 'class = "active"'; ?>><?=anchor('news',$this->lang->line('news'))?></li>
                    <li <?php if (strpos($active, 'statistic') === 0) echo 'class = "active"'; ?>><?=anchor('statistic',$this->lang->line('statistic'))?></li>
                    <?php
                    if ($this->session->userdata('is_admin') === TRUE):
                    ?>
                        <li class="dropdown <?php if (strpos($active, 'admin') === 0) echo 'active'; ?>">
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
                                <li><?=anchor("admin/news", $this->lang->line('news_admin'))?></li>
                            </ul>
                        </li>
                    <?php
                    endif;
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php
                        if (!$this->session->userdata('logged_in')):
                        ?>
                        <p class="navbar-text"><?=$this->lang->line('welcome').$this->session->userdata('username').' '.anchor("main/login/".$active, $this->lang->line('login'))?></p>
                        <?php
                        else:
                        ?>
                        <p class="navbar-text"><?=$this->lang->line('welcome').$this->session->userdata('username').' '.anchor("main/logout/".$active, $this->lang->line('logout'))?></p>
                        <?php
                        endif;
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>