<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="room-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="panel panel-info">
        <div class="panel-heading">Main information</div>
        <div class="panel-body">
            <div class="form-group "> 
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div> 
            <div class="form-group "> 
          

            <?php

echo $form->field($model, 'imageFile[]')->widget(FileInput::classname(), [
    'options'=>['multiple' => true]
]);
            ?>
          
       </div>      
            <div class="form-group"> 
                <?= $form->field($model, 'price')->textInput(['style' => 'width:100px'], ['maxlength' => true]) ?>
            </div> 


            <div class="form-group"> 

                <div class="form-inline"> 
                    <?=
                    $form->field($model, 'rooms_number')->dropDownList($model->getRoomsNumber(), $model->rooms_number_params);
                    ?> &nbsp; &nbsp;

                    <?= $form->field($model, 'floor')->dropDownList($model->getFloors(), $model->floor_params); ?>&nbsp; &nbsp;


                    <?= $form->field($model, 'square')->textInput(['style' => 'width:100px'], ['maxlength' => true]) ?>

                </div>
            </div> 






        </div>
    </div> 

    <div class="panel panel-info">
        <div class="panel-heading">Location</div>
        <div class="panel-body">
            <div class="form-group"> 
                <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>
                <div class="form-inline"> 
                    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
                    &nbsp; &nbsp;
                    <?= $form->field($model, 'house')->textInput(['style' => 'width:100px'], ['maxlength' => true]) ?>
                </div>
            </div> 
        </div>
    </div> 


    <div class="panel panel-info">
        <div class="panel-heading">Amenities</div>
        <div class="panel-body">
        
    <div class="form-group form-inline"> 
        <?= Html::img('@web/icons/parking.png', ['alt' => 'parking', 'class' => '']); ?>  <?= $form->field($model, 'has_parking')->checkbox() ?> &nbsp; &nbsp;

        <?= Html::img('@web/icons/lift.png', ['alt' => 'lift', 'class' => '']); ?>  <?= $form->field($model, 'has_lift')->checkbox() ?>

    </div>   

    <div class="form-group form-inline"> 

        <?= Html::img('@web/icons/tv.png', ['alt' => 'tv', 'class' => '']); ?>  <?= $form->field($model, 'has_tv')->checkbox() ?> &nbsp; &nbsp;

        <?= Html::img('@web/icons/wifi.png', ['alt' => 'wi-fi', 'class' => '']); ?>  <?= $form->field($model, 'has_wifi')->checkbox() ?> &nbsp; &nbsp;

        <?= Html::img('@web/icons/conditioner.png', ['alt' => 'conditioner', 'class' => '']); ?>  <?= $form->field($model, 'has_conditioner')->checkbox() ?> &nbsp; &nbsp;
      
        <?= Html::img('@web/icons/fridge.png', ['alt' => 'fridge', 'class' => '']); ?>  <?= $form->field($model, 'has_fridge')->checkbox() ?> &nbsp; &nbsp;

    </div> 


 <div class="form-group form-inline"> 
     <?= Html::img('@web/icons/washer.png', ['alt' => 'washer', 'class' => '']); ?>  <?= $form->field($model, 'has_washer')->checkbox() ?> &nbsp; &nbsp;

      <?= Html::img('@web/icons/iron.png', ['alt' => 'iron', 'class' => '']); ?>  <?= $form->field($model, 'has_iron')->checkbox() ?> &nbsp; &nbsp;

      <?= Html::img('@web/icons/iron-table.png', ['alt' => 'iron table', 'class' => '']); ?>  <?= $form->field($model, 'has_iron_table')->checkbox() ?>&nbsp; &nbsp;

      <?= Html::img('@web/icons/jacuzzi.png', ['alt' => 'jacuzzi', 'class' => '']); ?>  <?= $form->field($model, 'has_jacuzzi')->checkbox() ?>

   </div>  
        </div>
    </div>    



    
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
<div class="form-group"> 
     <?= $form->field($model, 'agree')->checkbox()->label('Accept <a href="">  the Terms and Conditions </a>'); ?> 
     
  </div> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
