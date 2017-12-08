<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property string $title
 * @property string $price
 * @property string $city
 * @property string $district
 * @property string $street
 * @property string $house
 * @property integer $floor
 * @property integer $rooms_number
 * @property string $square
 * @property integer $has_parking
 * @property integer $has_lift
 * @property integer $has_balcony
 * @property integer $has_fridge
 * @property integer $has_washer
 * @property integer $has_conditioner
 * @property integer $has_tv
 * @property integer $has_wifi
 * @property integer $has_iron
 * @property integer $has_iron_table
 * @property integer $has_jacuzzi
 * @property string $description
 * @property string $imageFile
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 
 * @property Reservation[] $reservations
 * @property User $user
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $agree;
	 public $date_range;
	 
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                 [['title', 'price', 'description', 'rooms_number', 'city', 'street'], 'required'],
                 [['price'], 'number'],
                 [['floor', 'rooms_number', 'has_parking', 'has_lift', 'has_balcony', 'has_fridge', 'has_washer', 'has_conditioner', 'has_tv', 'has_wifi', 'has_iron', 'has_iron_table', 'has_jacuzzi', 'created_at', 'updated_at', 'user_id'], 'integer'],
                 [['description'], 'string'],
                 [['title', 'city', 'district', 'street'], 'string', 'max' => 100],
                 [['description'], 'string', 'min' => 50, 'max' => 1000, ],
                 [['title'], 'string', 'min' => 5, 'max' => 50],
                 [['house', 'square'], 'string', 'max' => 5],
                 [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
                 [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg','maxFiles' => 10],
                 [['agree'], 'compare','operator' => '==','compareValue' => true,'message' => 'You must agree to the terms and conditions'],
                 [['agree'], 'safe'],
            ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
             return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price, USD per day',
            'city' => 'City',
            'district' => 'District',
            'street' => 'Street',
            'house' => 'House',
            'floor' => 'Floor',
            'rooms_number' => 'Number of rooms',
            'square' => 'Square',
            'has_parking' => 'Parking',
            'has_lift' => 'Lift',
            'has_balcony' => 'Balcony',
            'has_fridge' => 'Fridge',
            'has_washer' => 'Washer',
            'has_conditioner' => 'Conditioner',
            'has_tv' => 'Tv',
            'has_wifi' => 'Wi-fi',
            'has_iron' => 'Iron',
            'has_iron_table' => 'Iron Table',
            'has_jacuzzi' => 'Jacuzzi',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'imageFile' => 'Images',
			'agree' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
 
 

function getRoomsNumber() {
    $room_max = 5;
    $room_from = 1;
    $room_range = range($room_from, $room_max);
    return array_combine($room_range, $room_range);
}



function getFloors() {
    $floor_max = 30;
    $floor_from = 1;
    $floor_range = range($floor_from, $floor_max);
    return array_combine($floor_range, $floor_range);
}

public $floor_params = ['prompt' => 'select'];
public $rooms_number_params = ['prompt' => 'select'];
public $rooms_number_from = ['prompt' => 'rooms number from'];
public $rooms_number_to = ['prompt' => 'rooms number to'];
public $floor_number_from = ['prompt' => 'floor number from'];
public $floor_number_to = ['prompt' => 'floor number to'];
public $params_city = ['prompt' => 'city']; 
public $params_range = ['placeholder' => 'city']; 
}
