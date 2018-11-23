<?php

use yii\db\Migration;

class m181123_174925_create_table_place_lang extends Migration
{
    const TABLE = 'place_lang';
    const PLACE_ID_INDEX_COLUMN = 'place_id';
    const INDEX_PREFIX = 'idx_';
    const FOREIGN_KEY_PREFIX = 'fk_';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey()->unsigned(),
            'place_id' => $this->integer()->unsigned()->notNull(),
            'locality' => $this->string(45)->notNull(),
            'country' => $this->string(45)->notNull(),
            'lang' => $this->string(2)->notNull()
        ]);
        $this->createIndex(
            self::INDEX_PREFIX . self::TABLE . '_' . self::PLACE_ID_INDEX_COLUMN,
            self::TABLE,
            self::PLACE_ID_INDEX_COLUMN
        );
        $this->addForeignKey(
            self::FOREIGN_KEY_PREFIX . self::TABLE . '_' . self::PLACE_ID_INDEX_COLUMN,
            self::TABLE,
            self::PLACE_ID_INDEX_COLUMN,
            'place',
            'id',
            'restrict',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            self::FOREIGN_KEY_PREFIX . self::TABLE . '_' . self::PLACE_ID_INDEX_COLUMN,
            self::TABLE
        );
        $this->dropIndex(
            self::INDEX_PREFIX . self::TABLE . '_' . self::PLACE_ID_INDEX_COLUMN,
            self::TABLE
        );
        $this->dropTable(self::TABLE);
    }

}
