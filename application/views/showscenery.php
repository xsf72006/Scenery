<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-7
 * Time: 上午9:02
 */?>

<div class="row">
    <h3 class="text-center">
        <?=$scenery['sname']?>
    </h3>
    <hr>
    <?php
    if (!empty($scenery['img'])):
        ?>
        <div class="text-center">
            <img src="<?=base_url()?>/uploads/scenery/<?=$scenery['img']?>" height="300px"/>
        </div>
        <br>
    <?php
    endif;
    ?>
    <div class="col-md-offset-2 col-md-8">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="width: 20%">
                    <strong><?=$this->lang->line('summary')?></strong>
                </td>
                <td style="width: 80%">
                    <?=$scenery['summary']?>
                </td>
            </tr>
            <tr>
                <td style="width: 20%">
                    <strong><?=$this->lang->line('category')?></strong>
                </td>
                <td style="width: 80%">
                    <?=$scenery['categoryname']?>
                </td>
            </tr>
            <tr>
                <td style="width: 20%">
                    <strong><?=$this->lang->line('area')?></strong>
                </td>
                <td style="width: 80%">
                    <?=$scenery['area']?>
                </td>
            </tr>
            <tr>
                <td style="width: 20%">
                    <strong><?=$this->lang->line('traffic')?></strong>
                </td>
                <td style="width: 80%">
                    <?=$scenery['traffic']?>
                </td>
            </tr>
            <tr>
                <td style="width: 20%">
                    <strong><?=$this->lang->line('position')?></strong>
                </td>
                <td style="width: 80%">
                    <?=$scenery['position']?>
                </td>
            </tr>
            <tr>
                <td style="width: 20%">
                    <strong><?=$this->lang->line('bus')?></strong>
                </td>
                <td style="width: 80%">
                    <?=$scenery['bus']?>
                </td>
            </tr>
            </tbody>
        </table>
        <?php
        foreach ($subscenery as $row)
        {
            echo '<table class="table table-bordered">';
            echo '<tbody>';
            echo '<tr>';
            echo '<td style="width: 20%">';
            echo '<strong>'.$this->lang->line('subscenery').'</strong>';
            echo '</td>';
            echo '<td style="width: 80%">';
            echo $row['name'];
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td style="width: 20%">';
            echo '<strong>'.$this->lang->line('subsceneryimg').'</strong>';
            echo '</td>';
            echo '<td style="width: 80%">';
            echo '<img src="'.base_url().'/uploads/subscenery/'.$row['img'].'" height="300px"/>';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td style="width: 20%">';
            echo '<strong>'.$this->lang->line('subsummary').'</strong>';
            echo '</td>';
            echo '<td style="width: 80%">';
            echo $row['summary'];
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
        }
        ?>
    </div>
</div>