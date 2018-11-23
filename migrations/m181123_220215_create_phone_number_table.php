<?php

use yii\db\Migration;

class m181123_220215_create_phone_number_table extends Migration
{
    const TABLE = 'phone_number';

    public function up()
    {
        $this->createTable(self::TABLE,
            [
                'id' => $this->primaryKey()->unsigned(),
                'user_id' => $this->integer()->unsigned()->notNull(),
                'country_id' => $this->integer()->unsigned()->notNull(),
                'number' => $this->string(45)->notNull(),
                'verification_code' => $this->string(45)->notNull(),
                'verified' => $this->boolean()->notNull()->defaultValue(false),
                'active' => $this->boolean()->notNull()->defaultValue(true),
                'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
            ]);
        $this->createIndex('idx_phone_number_user_id_user', self::TABLE, 'user_id');
        $this->addForeignKey('fk_phone_number_user_id_user', self::TABLE, 'user_id', 'user', 'id', 'restrict', 'cascade');
        $this->createIndex('idx_phone_number_country_id_country', self::TABLE, 'country_id');
        $this->addForeignKey('fk_phone_number_country_id_country', self::TABLE, 'country_id', 'country', 'id', 'restrict', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_phone_number_user_id_user', self::TABLE);
        $this->dropIndex('idx_phone_number_user_id_user', self::TABLE);
        $this->dropForeignKey('fk_phone_number_country_id_country', self::TABLE);
        $this->dropIndex('idx_phone_number_country_id_country', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
