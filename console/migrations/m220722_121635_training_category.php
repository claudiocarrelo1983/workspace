<?php

use yii\db\Migration;

/**
 * Class m220722_121635_training_category
 */
class m220722_121635_training_category extends Migration
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
        echo "m220722_121635_training_category cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%training_category}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'training_code' => $this->string(),
            'title' => $this->string(128)->notNull(),
            'text' => $this->text(),
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%training_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220722_121635_training_category cannot be reverted.\n";

        return false;
    }
    */
}
