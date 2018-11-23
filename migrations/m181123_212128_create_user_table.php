<?php

use yii\db\Migration;

class m181123_212128_create_user_table extends Migration
{
    const TABLE = 'user';

    public function up()
    {
        $this->createTable(self::TABLE,
            [
                'id' => $this->primaryKey()->unsigned(),
                'uid' => $this->string(60)->unique()->notNull(),
                'username' => $this->string(45)->notNull(),
                'email' => $this->string(255)->unique()->notNull(),
                'password' => $this->string(60)->notNull(),
                'status' => $this->integer(4)->notNull()->defaultValue(0),
                'contact_email' => $this->boolean()->notNull()->defaultValue(false),
                'contact_phone' => $this->boolean()->notNull()->defaultValue(false),
                'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
            ]);
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
