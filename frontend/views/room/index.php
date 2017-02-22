<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Search and reserv apartments</h3> </div>
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

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Top apartments</h3> </div>
        <div class="panel-body">



            <?php
            foreach ($top_apartments as $top) {

                if ($top->imageFile != '') {

                    $images = array_slice( explode(",", $top->imageFile), 0, 1);

                    echo '<img src="' . current($images) . '" class="img-responsive" > ';
                   
                } else {
					echo '<img src="uploads/noimage.png" class="img-responsive" > ';
				}
				
                echo '' . Html::a(Html::encode($top->title), ['view', 'id' => $top->id]) . '<br>';
                echo '' . $top->price . '<br>';

              
                ?> <br>


            <?php } ?>
        </div>
    </div>
</div>




