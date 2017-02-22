<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property integer $id
 * @property string $status
 * @property integer $guests_number
 * @property integer $date_from
 * @property integer $date_to
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property integer $room_id
 *
 * @property Room $room
 * @property User $user
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guests_number', 'date_from', 'date_to', 'created_at', 'updated_at', 'user_id', 'room_id'], 'integer'],
            [['date_from', 'date_to', 'created_at', 'updated_at'], 'required'],
            [['status'], 'string', 'max' => 255],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'guests_number' => 'Guests Number',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'room_id' => 'Room ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
