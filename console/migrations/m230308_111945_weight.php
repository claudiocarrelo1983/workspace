<?php

use yii\db\Migration;

/**
 * Class m230308_111945_weight
 */
class m230308_111945_weight extends Migration
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
        echo "m230308_111945_weight cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%weight}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
            'kg' => $this->integer()->notNull(),
            'lbs' => $this->integer()->notNull(),   
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%weight}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230308_111945_weight cannot be reverted.\n";

        return false;
    }
    */
}
