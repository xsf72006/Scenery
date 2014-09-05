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
<script type="javascript">
    $(document).ready(function(){
        $('#sidebar').affix({
            offset: {
                top: $('nav').height()
            }
        });
    })
</script>
</body>
</html>