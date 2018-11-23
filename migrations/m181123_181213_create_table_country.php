<?php

use yii\db\Migration;

/**
 * Class m181123_181213_create_table_country
 */
class m181123_181213_create_table_country extends Migration
{
    const TABLE = 'country';

    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m181123_181213_create_table_country cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey()->unsigned(),
            'code' => $this->string(2)->unique(),
            'name' => $this->string(80)->notNull(),
            'phonecode' => $this->integer(5)->notNull(),
            'lng' => $this->string(45)->notNull(),
            'lat' => $this->string(45)->notNull(),

        ]);
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
//        echo "m181123_181213_create_table_country cannot be reverted.\n";
//
//        return false;
    }

}
