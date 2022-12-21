<?php

use yii\db\Migration;

/**
 * Class m220715_122547_blogs__comments
 */
class m220715_122547_blogs__comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs_comments}}', [
            'id' => $this->primaryKey(),
            'blog_id' => $this->string()->notNull(),
            'parent_id' => $this->string()->notNull(),
            'username' => $this->string()->notNull(),
            'comment' => $this->string()->notNull(),                   
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220715_122547_blogs_comments cannot be reverted.\n";

        return false;
    }

    public function down()
    {
        $this->dropTable('{{%blogs_comments}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220715_122547_blogs__comments cannot be reverted.\n";

        return false;
    }
    */
}
