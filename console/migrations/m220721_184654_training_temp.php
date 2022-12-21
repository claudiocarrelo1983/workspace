<?php

use yii\db\Migration;

/**
 * Class m220721_184654_training_temp
 */
class m220721_184654_training_temp extends Migration
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
        echo "m220721_184654_training_temp cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%training_temp}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(128)->notNull(),
            'week' => $this->integer(),
            'code' => $this->string()->notNull()->unique(),
            'title' => $this->string(128)->notNull(),
            'maquina' => $this->string(128)->notNull(),
            'image' => $this->string(128)->notNull(),
            'type' => $this->string(128)->notNull(),
            'order' => $this->string(128)->notNull(),
            'data' => $this->date()->notNull(),          
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%training_temp}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_184654_training_temp cannot be reverted.\n";

        return false;
    }
    */
}
