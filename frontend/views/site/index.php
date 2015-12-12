<?php
use common\models\Court;
use frontend\assets\CourtAsset;
CourtAsset::register($this);
$court = new Court;
$this->title = '法院列表';
$this->params['breadcrumbs'][] = $this->title;
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
    <div class="side">
        <h2>法院列表</h2>
        <ul id="tree" class="filetree">
           <?php $court->treeCourts(0); ?>
        </ul>
    </div>
    <div class="section">
        <iframe name="court-list" src="index.php?r=court/show&court=0" frameborder="0"></iframe>
    </div>

</div>