<?php
    use yii\widgets\LinkPager;
    use frontend\assets\FreezeHeaderAsset;
    FreezeHeaderAsset::register($this);
?>

<?php
$js = <<<JS
$(function(){

    $("#table1").freezeHeader();
    $("#table1").find("tr").addClass("grid");
    $("#table1").find("tr:odd").addClass("gridAlternada");

})
            
JS;

$this->registerJs($js);
?>

<table class="gridView" id="table1">
        <thead>
            <tr>
                <th>序号</th>
                <th>法院名称</th>
                <th>法院编号</th>
                <th>流水号前缀</th>
                <th>法院级别</th>
                <th>注册时间</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            

    <?php

    foreach ($court_info as $v) {
        echo "<tr>";
        echo "<td>" . $v['rowno'] . "</td>";
        echo "<td>" . $v['courtname'] . "</td>";
        echo "<td>" . $v['courtnumber'] . "</td>";
        echo "<td>" . $v['prefix_flownumber'] . "</td>";
        echo "<td>" . $v['court_type_level'] . "</td>";
        echo "<td>" . $v['register_date'] . "</td>";
        echo "<td><a href='index.php?r=court/enter&num=" . $v['courtnumber'] . "'>进入法院 ←</a></td>";
        echo "</tr>";
    }
?>
     
        </tbody>
    </table>

    <div class="footer">
   <?= LinkPager::widget(['pagination' => $pages]); ?>
    </div>