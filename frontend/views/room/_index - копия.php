<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Room;



?>

<div class="col-md-8">
    
        <div class="panel-body">



 
   <?php
if ($model->imageFile != '') {

                    $images = array_slice( explode(",", $model->imageFile), 0, 1);

                    echo '<img src="' . current($images) . '" class="img-responsive" > ';
                   
                } else {
					//echo '<img src="uploads/noimage.png" class="img-responsive" > ';
									
				}
				
				 ?>

</div>
</div>


<div class="col-md-4">

<div class="panel panel-info">
        <div class="panel-heading"> <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?>	</div>
        <div class="panel-body">

		 <?=$model->price ?>	<br>
      <?=$model->rooms_number ?>	<br>
       <?=$model->city ?>	<br>	
		</div></div></div>



		
  
   

 </div> 
							
								
