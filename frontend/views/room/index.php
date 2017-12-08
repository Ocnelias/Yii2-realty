<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use frontend\assets\FontAwesomeAsset;

FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Search and book apartments</h3> </div>
        <div class="panel-body">


            <div class="room-index">

                <h1><?= Html::encode($this->title) ?></h1>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>


                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'layout' => "{sorter}\n{items}\n{summary}\n{pager}",
                    'sorter' => [
                        'class' => 'rsr\yii2\ButtonDropdownSorter',
                        'label' => 'Sort by',
                        'attributes' => [
                            'price',
                        ],
                    ],
                    'summary' => "<small> found {totalCount} apartments <p> </small>",
                    'itemView' => '_index',
                ])
                ?>
            </div>


        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Top apartments</h3> </div>
        <div class="panel-body">



            <?php foreach ($top_apartments as $top) { ?>
                <div class="panel panel-info"> 
                    <?php
                    if ($top->imageFile != '') {

                        $images = array_slice(explode(",", $top->imageFile), 0, 1);

                        echo '<img src="' . current($images) . '" class="img-responsive" > ';
                    } else {
                        echo '<img src="uploads/noimage.png" class="img-responsive" > ';
                    }
                    ?> 
                    <div class="panel-heading"> <?= Html::a('' . Html::encode($top->title) . ' <span class="glyphicon glyphicon-chevron-right"></span>', ['view', 'id' => $top->id]) ?> </div>
                    <div class="panel-body">
                    <?= Html::a('<i class="fa fa-hand-o-right" aria-hidden="true"></i> Book now ', ['view', 'id' => $top->id], $options = ['class' => 'btn btn-primary pull-right']); ?>

                        price: <strong>  <?=  Yii::$app->formatter->asCurrency($top->price,''); ?>	</strong>  USD <br>
                        rooms:  <strong>  <?= $top->rooms_number ?>		</strong> <br>
                        city:  <strong>  <?= $top->city ?>		</strong> <br>	


                    </div></div>  


<?php } ?>

                <div class="well">
                    
                    <br />
                        <?php if (isset($this->blocks['blockADV'])) { ?>
                        <?php echo $this->blocks['blockADV']; ?>
                         <?php } else { ?>
                        <i></i>
                         <?php } ?>
                </div>
            
            
<?php $this->beginBlock('blockADV'); ?>
<b>advertise here</b>
<?php $this->endBlock(); ?>
        </div>
    </div>
</div>




