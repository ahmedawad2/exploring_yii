<?php

use yii\db\Migration;

class m181123_212613_create_trip_table extends Migration
{
    const TABLE = 'trip';

    public function up()
    {
        $this->createTable(self::TABLE,
            [
                'id' => $this->primaryKey()->unsigned(),
                'user_id' => $this->integer()->unsigned()->notNull(),
                'from' => $this->integer()->unsigned()->notNull(),
                'to' => $this->integer()->unsigned()->notNull(),
                'date' => $this->dateTime()->notNull(),
                'number_seats' => $this->integer(4)->notNull(),
                'duration' => $this->decimal(10, 1)->notNull(),
                'price' => $this->decimal(10, 2)->notNull(),
                'currency_id' => $this->integer()->unsigned()->notNull(),
                'status' => $this->integer(4)->notNull()->defaultValue(1),
                'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
            ]);

        $this->createIndex('idx_trip_user_id_user', self::TABLE, 'user_id');
        $this->addForeignKey('fk_trip_user_id_user', self::TABLE, 'user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_trip_from_place', self::TABLE, 'from');
        $this->addForeignKey('fk_trip_from_place', self::TABLE, 'from', 'place', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_trip_to_place', self::TABLE, 'to');
        $this->addForeignKey('fk_trip_to_place', self::TABLE, 'to', 'place', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_trip_currency_id_currency', self::TABLE, 'currency_id');
        $this->addForeignKey('fk_trip_currency_id_currency', self::TABLE, 'currency_id', 'currency', 'id', 'restrict', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_trip_user_id_user', self::TABLE);
        $this->dropIndex('idx_trip_user_id_user', self::TABLE);
        $this->dropForeignKey('fk_trip_from_place', self::TABLE);
        $this->dropIndex('idx_trip_from_place', self::TABLE);
        $this->dropForeignKey('fk_trip_to_place', self::TABLE);
        $this->dropIndex('idx_trip_to_place', self::TABLE);
        $this->dropForeignKey('fk_trip_currency_id_currency', self::TABLE);
        $this->dropIndex('idx_trip_currency_id_currency', self::TABLE);

        $this->dropTable(self::TABLE);
    }
}
