<?php

use yii\db\Migration;

class m181123_164455_create_table_places extends Migration
{
    const TABLE = 'place';

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
        $this->dropTable(self::TABLE);
    }

}
