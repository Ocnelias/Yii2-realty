<?php

namespace frontend\models;

use common\models\User;
use Yii;

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
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property Reservation[] $reservations
 * @property User $user
 */
class Room extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
     public $imageFile;

    public static function tableName() {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                 [['title', 'price', 'description', 'rooms_number', 'city', 'street'], 'required'],
                 [['price'], 'number'],
                 [['floor', 'rooms_number', 'has_parking', 'has_lift', 'has_balcony', 'has_fridge', 'has_washer', 'has_conditioner', 'has_tv', 'has_wifi', 'has_iron', 'has_iron_table', 'has_jacuzzi', 'created_at', 'updated_at', 'user_id'], 'integer'],
                 [['description'], 'string'],
                 [['title', 'city', 'district', 'street'], 'string', 'max' => 100],
                 [['description'], 'string', 'max' => 1000, 'min' => 50],
                 [['house', 'square'], 'string', 'max' => 5],
                 [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
                 [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price, USD per day',
            'city' => 'City',
            'district' => 'District',
            'street' => 'Street',
            'house' => 'House',
            'floor' => 'Floor',
            'rooms_number' => 'Rooms number',
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations() {
        return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

 public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

}
