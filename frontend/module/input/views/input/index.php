<?php
    use yii\widgets\LinkPager;
    $this->title = "数据录入-" . $title;
    $this->params['breadcrumbs'][] = "数据录入";
    $this->params['breadcrumbs'][] = $title;
?>

<?php $this->beginBlock('bar') ?>

<?php
    foreach( $tool_bar as $k=>$v ){
?>
    <li class="fnt ico-<?=$k?>"><span data-action=""><?=$v?></span></li>
<?php
    }
?>

<?php $this->endBlock() ?>

<div id="artical">
   
    <table id="myTable">
    <tr>
    <?php
            foreach( $model::tableTh() as $v ){
                echo '<th>' . $v . '</th>';
            }
    ?>
    </tr>

    <?php
       
        foreach ( $model_info as $_key => $_value ) {

            echo "<tr data-id=" . $_value["ID"] . ">";
                if($_key == "No"){
                    continue;
                }
                foreach ( $model::tableTh() as $key => $value) {
                        echo "<td>" . $_value[$key] . "</td>";
                }

            echo "</tr>";
        }

    ?>
    </table>
     
</div>
<?= LinkPager::widget(['pagination' => $pages]); ?>