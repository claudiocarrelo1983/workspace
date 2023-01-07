<?php

use yii\db\Migration;

/**
 * Class m230107_162708_comments
 */
class m230107_162708_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230107_162708_comments cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'page' => $this->string()->notNull(),
            'comment_id' => $this->string()->notNull(),
            'parent_id' => $this->string(),
            'full_name' => $this->string()->notNull(),
            'email' => $this->string(),
            'comment' => $this->text()->notNull(), 
            'validation' => $this->boolean(),                 
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%comments}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230107_162708_comments cannot be reverted.\n";

        return false;
    }
    */
}
