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
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reservation');
    }
}
