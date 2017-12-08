<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $first_name
 * @property string $phone
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Reservation[] $reservations
 * @property Room[] $rooms
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
                [['status', 'created_at', 'updated_at'], 'integer'],
                [['username', 'password_hash', 'password_reset_token', 'email', 'first_name', 'phone'], 'string', 'max' => 255],
                [['auth_key'], 'string', 'max' => 32],
                [['username'], 'unique'],
                [['email'], 'unique'],
                [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'first_name' => 'First Name',
            'phone' => 'Phone',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations() {
        return $this->hasMany(Reservation::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms() {
        return $this->hasMany(Room::className(), ['user_id' => 'id']);
    }

    const ROLE_USER = 1;
    const ROLE_OWNER = 5;
    const ROLE_ADMIN = 10;

}
