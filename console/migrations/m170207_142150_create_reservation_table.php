<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reservation`.
 */
class m170207_142150_create_reservation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reservation', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->null(),
            'guests_number' => $this->integer()->null(),
            'date_from' => $this->integer()->notNull(),
            'date_to' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
            'room_id' => $this->integer(),
        ]);

        $this->createIndex('FK_room_owners', '{{%reservation}}', 'user_id');
        $this->addForeignKey(
                'FK_room_owners', '{{%reservation}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );
        
         $this->createIndex('FK_room', '{{%reservation}}', 'room_id');
        $this->addForeignKey(
                'FK_room', '{{%reservation}}', 'room_id', '{{%room}}', 'id', 'SET NULL', 'CASCADE'
        );
        
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reservation');
    }
}
