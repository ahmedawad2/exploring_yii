<?php

use yii\db\Migration;

class m181123_220019_create_message_table extends Migration
{
    const TABLE = 'message';

    public function up()
    {
        $this->createTable(self::TABLE,
            [
                'id' => $this->primaryKey()->unsigned(),
                'from_user_id' => $this->integer()->unsigned()->notNull(),
                'to_user_id' => $this->integer()->unsigned()->notNull(),
                'trip_id' => $this->integer()->unsigned()->notNull(),
                'text' => $this->text()->notNull(),
                'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
            ]);

        $this->createIndex('idx_message_from_user_id_user', self::TABLE, 'from_user_id');
        $this->addForeignKey('fk_message_from_user_id_user', self::TABLE, 'from_user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_message_to_user_id_user', self::TABLE, 'to_user_id');
        $this->addForeignKey('fk_message_to_user_id_user', self::TABLE, 'to_user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_message_trip_id_trip', self::TABLE, 'trip_id');
        $this->addForeignKey('fk_message_trip_id_trip', self::TABLE, 'trip_id', 'trip', 'id', 'restrict', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_message_from_user_id_user', self::TABLE);
        $this->dropIndex('idx_message_from_user_id_user', self::TABLE);
        $this->dropForeignKey('fk_message_to_user_id_user', self::TABLE);
        $this->dropIndex('idx_message_to_user_id_user', self::TABLE);
        $this->dropForeignKey('fk_message_trip_id_trip', self::TABLE);
        $this->dropIndex('idx_message_trip_id_trip', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
