<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

use frontend\models\Room;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view">



    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading"><h3>  <?= Html::encode($this->title) ?> </h3> </div>
            <div class="panel-body">

<?php if ($model->imageFile != '') { ?>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="30000", data-pause="hover">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $images = explode(",", $model->imageFile);
                        for ($i = 0; $i < count($images); $i++) {
                            ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class=""> </li>
                        <?php } ?>
                    </ol>   
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">

                            <?php
                            $image_first = array_slice(explode(",", $model->imageFile), 0, 1);
                            foreach ($image_first as $image) {

                                echo '<img src="' . $image . '" class="img-responsive"> </div> ';
                            }

                            $image_rest = array_slice(explode(",", $model->imageFile), 1);
                            foreach ($image_rest as $image) {
                                ?>

                                <div class="item">
                                    <?php echo '<img src="' . $image . '" class="img-responsive">   </div> ';
                                } ?> 



                            </div>

                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>         




                 
                <?php } ?>
				
				 <?php 
     $attributes = [
    [
        'group'=>true,
        'label'=>'Main information',
        'rowOptions'=>['class'=>'info']
    ],
    [    
                'attribute'=>'price', 
                'value'=>$model->price, 
                'format'=>['decimal', 2],				
    ],
	[    
                'attribute'=>'rooms_number', 
                'value'=>$model->rooms_number,              
    ],
	[    
                'attribute'=>'floor', 
                'value'=>$model->floor,              
    ],
	[    
                'attribute'=>'square', 
                'value'=>$model->square,              
    ],
    [
        'group'=>true,
        'label'=>'Location',
        'rowOptions'=>['class'=>'info']
    ],
	[    
                'attribute'=>'city', 
                'value'=>$model->city,              
    ],
	[    
                'attribute'=>'district', 
                'value'=>$model->district,              
    ],
	[    
                'attribute'=>'street', 
                'value'=>$model->district,              
    ],
	[    
                'attribute'=>'house', 
                'value'=>$model->house,              
    ],
	[
        'group'=>true,
        'label'=>'Amenities',
        'rowOptions'=>['class'=>'info']
    ],
	[
    'attribute'=>'has_parking', 
                'format'=>'raw',
                'value'=>$model->has_parking ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
    [
    'attribute'=>'has_lift', 
                'format'=>'raw',
                'value'=>$model->has_lift ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
	[
    'attribute'=>'has_fridge', 
                'format'=>'raw',
                'value'=>$model->has_fridge ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
	[
    'attribute'=>'has_washer', 
                'format'=>'raw',
                'value'=>$model->has_washer ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
    [
    'attribute'=>'has_conditioner', 
                'format'=>'raw',
                'value'=>$model->has_conditioner ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
	    [
    'attribute'=>'has_tv', 
                'format'=>'raw',
                'value'=>$model->has_tv ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
	    [
    'attribute'=>'has_wifi', 
                'format'=>'raw',
                'value'=>$model->has_wifi ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],

	    [
    'attribute'=>'has_iron', 
                'format'=>'raw',
                'value'=>$model->has_iron ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
	    [
    'attribute'=>'has_iron_table', 
                'format'=>'raw',
                'value'=>$model->has_iron_table ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
	    [
    'attribute'=>'has_jacuzzi', 
                'format'=>'raw',
                'value'=>$model->has_jacuzzi ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                
    ],
 [
        'group'=>true,
        'label'=>'Description',
        'rowOptions'=>['class'=>'info']
    ],
  [
        'attribute'=>'description',
		'label'=>'',
        'format'=>'raw',
        'value'=>'<span class="text-justify"><em>' . $model->description . '</em></span>',
        'type'=>DetailView::INPUT_TEXTAREA, 
        'options'=>['rows'=>4]
    ]
	
];
		?> 
   
<?= DetailView::widget([
    'model'=>$model,
	'attributes' => $attributes,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
	'enableEditMode'=>false,

]); ?>
 

		
			
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>

               </div> 
                </div>
				</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading"><h3> </h3> </div>
        <div class="panel-body">

<h4>Owner</h4>
<?=Html::a('Book now!>', ['view', 'id' => $model->id],$options =['class' => 'btn btn-primary'] );?>
        </div>
    </div>
</div>

</div>


       
