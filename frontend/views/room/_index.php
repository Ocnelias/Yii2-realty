<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Room;



?>

<div class="col-md-12">
    
        <div class="panel-body">



 
   <?php
if ($model->imageFile != '') {

                    $images = array_slice( explode(",", $model->imageFile), 0, 1);

                    echo '<img src="' . current($images) . '" class="img-responsive" > ';
                   
                } else {
					//echo '<img src="uploads/noimage.png" class="img-responsive" > ';
									
				}
				
				 ?>
		 <div class="panel-body">
	 <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?>	<br>	
    <?=$model->price ?>	<br>
    <?=$model->rooms_number ?>	<br>
	 <?=$model->floor ?>	<br>
	  <?=$model->city ?>	<br>		 
				        </div> 
</div>

<div class="col-md-6">
    
    

						        </div> 
</div>