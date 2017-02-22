<?php

use yii\db\Migration;

/**
 * Handles the creation of table `room`.
 */
class m170207_142132_create_room_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('room', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'price' => $this->money()->null(),
            'city' => $this->string(255)->null(),
            'district' => $this->string(255)->null(),
            'street' => $this->string(255)->null(),
            'house' => $this->string(10)->null(),
            'floor' => $this->integer()->null(),
            'rooms_number' => $this->integer()->null(),
            'square' => $this->string(10)->null(),
            'has_parking' => $this->smallInteger()->null(),
            'has_lift' => $this->smallInteger()->null(),
            'has_balcony' => $this->smallInteger()->null(),
            'has_fridge' => $this->smallInteger()->null(),
            'has_washer' => $this->smallInteger()->null(),
            'has_conditioner' => $this->smallInteger()->null(),
            'has_tv' => $this->smallInteger()->null(),
            'has_wifi' => $this->smallInteger()->null(),
            'has_iron' => $this->smallInteger()->null(),
            'has_iron_table' => $this->smallInteger()->null(),
            'has_jacuzzi' => $this->smallInteger()->null(),
            'description' => $this->text()->notNull(),
            'imageFile' => $this->string(255)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
        ]);

        $this->createIndex('FK_room_owner', '{{%room}}', 'user_id');
        $this->addForeignKey(
                'FK_room_owner', '{{%room}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('room');
    }

}
