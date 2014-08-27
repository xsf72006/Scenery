<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:57
 */ -->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->lang->line('title')?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            echo validation_errors();
            $attr = array('class'=>'form-horizontal');
            echo form_open('welcome/login', $attr); ?>
                <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label"><?=$this->lang->line('username')?></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="username" value="<?=set_value('username')?>">
                        <?=form_error('username')?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPsw" class="col-sm-4 control-label"><?=$this->lang->line('password')?></label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" value="<?=set_value('password')?>">
                        <?=form_error('password')?>
                    </div>
                </div>

            </form>
        </div>
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>