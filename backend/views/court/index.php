<?php

use yii\widgets\LinkPager;


$this->title = '后台管理-法院管理';
// $this->params['breadcrumbs'][] = '法院管理';

?>

<?php $this->beginBlock('bar') ?>

<?php
    foreach( $toolbars as $k=>$v ){
?>
    <li class="fnt ico-<?=$k?>"><span data-action=""><?=$v?></span></li>
<?php
    }
?>

<?php $this->endBlock() ?>


<div id="artical">
   
    <table id="myTable">
    <tr>
        <th>序号</th>
        <th>法院名称</th>
        <th>法院编号</th>
        <th>上级法院</th>
        <th>流水号前缀</th>
        <th>法院级别</th>
        <th>注册时间</th>
    </tr>

     <?php

    foreach ($model_info as $v) {
        echo "<tr data-id='" . $v['id'] . "'>";
        echo "<td>" . $v['rowno'] . "</td>";
        echo "<td>" . $v['courtname'] . "</td>";
        echo "<td>" . $v['courtnumber'] . "</td>";
        echo "<td>" . $v['up_level'] . "</td>";
        echo "<td>" . $v['prefix_flownumber'] . "</td>";
        echo "<td>" . $v['court_type_level'] . "</td>";
        echo "<td>" . $v['register_date'] . "</td>";
        echo "</tr>";
    }
	?>
    </table>
     
</div>
<?= LinkPager::widget(['pagination' => $pages]); ?>