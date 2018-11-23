<?php

use yii\db\Migration;

/**
 * Class m181123_164455_create_table_places
 */
class m181123_164455_create_table_places extends Migration
{
    const TABLE = 'place';
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }

    /**
     * {@inheritdoc}
     */
//    public function safeDown()
//    {
//        echo "m181123_164455_create_table_places cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey()->unsigned(),
            'place_id' => $this->string(45)->notNull(),
            'lng' => $this->string(45)->notNull(),
            'lat' => $this->string(45)->notNull(),
            'country_code' => $this->string(2)->notNull(),
            'is_country' => $this->boolean()->notNull()
        ]);
    }

    public function down()
    {
//        echo "m181123_164455_create_table_places cannot be reverted.\n";
//
//        return false;
        $this->dropTable(self::TABLE);
    }

}
