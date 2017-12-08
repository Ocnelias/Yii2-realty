<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Room;
?>

<div class="col-md-12">

    <div class="panel panel-default">



        <div class="panel-heading"> <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?>	</div>
        <div class="panel-body">
            <div class="col-md-6"> 
                <?php
                if ($model->imageFile != '') {

                    $images = array_slice(explode(",", $model->imageFile), 0, 1);

                    echo '<img src="' . current($images) . '" class="img-responsive" > ';
                } else {
                    echo '<img src="uploads/noimage.png" class="img-responsive" > ';
                }
                ?> </div>

            <div class="col-md-6"> 
                price: <strong>  <?= Yii::$app->formatter->asCurrency($model->price, ''); ?>	</strong>  USD <br>
                rooms:  <strong>  <?= $model->rooms_number ?>		</strong> <br>
                city:  <strong>  <?= $model->city ?>		</strong> <br>	
                <?= Html::a('show more', ['view', 'id' => $model->id]) ?>
            </div>	
        </div></div></div>








