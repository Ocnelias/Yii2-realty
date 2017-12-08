<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
//use yii\widgets\DatePicker;
use frontend\models\Room;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RoomSearch */
/* @var $form yii\widgets\ActiveForm */
?>





<?php
$form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]);
?>




<div class="form-inline">
    <div class="form-group">
    <?= $form->field($model, 'city')->dropDownList(ArrayHelper::map(Room::find()->all(), 'city', 'city'), $model->params_city)->label('') ?>
    </div>

    <?php
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'date_range',
            //'language' => 'ru',
            //'dateFormat' => 'yyyy-MM-dd',
    ]);
    ;
    ?>


</div>

<a class="accordion-toggle text-center"  data-toggle="collapse" href="#collapse">  <span class=" glyphicon glyphicon-chevron-down"></span>   Advanced search </a>

<div id="collapse" class="panel-collapse collapse">

    <div class="form-group form-inline"> 

        <?= $form->field($model, 'min_price')->textInput()->input('min_price', ['placeholder' => "price from"])->label(false) ?>	   



        <?= $form->field($model, 'max_price')->textInput()->input('max_price', ['placeholder' => "price to"])->label(false) ?>	   

    </div>


    <div class="form-group form-inline"> 

        <?= $form->field($model, 'min_room')->dropDownList($model->getRoomsNumber(), $model->rooms_number_from)->label(''); ?>	
        <?= $form->field($model, 'max_room')->dropDownList($model->getRoomsNumber(), $model->rooms_number_to)->label(''); ?>	

    </div>
    <div class="form-group form-inline"> 
        <?= $form->field($model, 'max_floor')->dropDownList($model->getFloors(), $model->floor_number_from)->label(''); ?>	


        <?= $form->field($model, 'max_floor')->dropDownList($model->getFloors(), $model->floor_number_to)->label(''); ?>	
    </div>





    <div class="form-group form-inline"> 
        <?= $form->field($model, 'has_parking')->checkbox() ?> 
        <?= $form->field($model, 'has_lift')->checkbox() ?> 
        <?= $form->field($model, 'has_tv')->checkbox() ?> 

        <?= $form->field($model, 'has_wifi')->checkbox() ?>

        <?= $form->field($model, 'has_conditioner')->checkbox() ?>

        <?= $form->field($model, 'has_fridge')->checkbox() ?> 
    </div> 
    <div class="form-group form-inline"> 
        <?= $form->field($model, 'has_washer')->checkbox() ?> 

        <?= $form->field($model, 'has_iron')->checkbox() ?> 

        <?= $form->field($model, 'has_iron_table')->checkbox() ?>

        <?= $form->field($model, 'has_jacuzzi')->checkbox() ?>

    </div> 

</div>


<div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary ']) ?>

</div>	






<?php ActiveForm::end(); ?>


