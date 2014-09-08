<!--
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:56
 */-->

    <!-- Copyright -->
    <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <div class="navbar-header navbar-left">
                <p class="navbar-text small"><?=$this->lang->line('copyright1')?></p>

            </div>
            <div class="navbar-header navbar-right">
                <p class="navbar-text small"><?=$this->lang->line('copyright2')?></p>
            </div>
        </div>
    </nav>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#sidebar').affix({
            offset: {
                //top: $('nav').height()
            }
        });
        $('.vleft').height(document.body.scrollHeight-60+"px");
    });
    $('#addsub').click(function(){
        $('#subsub').show();
        $('#subscenery').append($("<hr>"));
        $('#subscenery').append($("<div class=\"form-group\"><label for=\"inputEmail\" class=\"col-sm-2 control-label\">"+
            "<?=$this->lang->line('subscenery')?></label><div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" "+
            "name=\"subscenery[]\"><?=form_error('subscenery')?></div></div>"));
        $('#subscenery').append($("<div class=\"form-group\"><label for=\"inputEmail\" class=\"col-sm-2 control-label\">"+
            "<?=$this->lang->line('subsummary')?></label><div class=\"col-sm-6\"><textarea class=\"form-control\" "+
            " name=\"subsummary[]\" rows=\"10\"></textarea><?=form_error('subsummary')?></div></div>"));
        $('#subscenery').append($("<div class=\"form-group\"><label for=\"inputEmail\" class=\"col-sm-2 control-label\">"+
            "<?=$this->lang->line('subsceneryimg')?></label><div class=\"col-sm-4\"><input type=\"file\" name=\"subimg[]\"></div></div>"));
    });
    $('#subsub').click(function(){
        if ($('#subscenery').children('div').length <= 6)
        {
            $('#subsub').hide();
        }
        $('#subscenery').children().last().remove();
        $('#subscenery').children().last().remove();
        $('#subscenery').children().last().remove();
        $('#subscenery').children().last().remove();
    })
</script>
</body>
</html>