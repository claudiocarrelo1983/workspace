<?php

use yii\db\Migration;

/**
 * Class m220721_183736_training_values
 */
class m220721_183736_training_values extends Migration
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
        echo "m220721_183736_training_values cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%training_values}}', [
            'id' => $this->primaryKey(),      
            'username' => $this->string()->notNull(),      
            'id_treino' => $this->integer(),
            'week' => $this->integer(),
            'reps' => $this->integer(),
            'type' => $this->string(40),
            'value' => $this->integer(),  
            'created_date' => $this->timestamp()        
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%training_values}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_183736_training_values cannot be reverted.\n";

        return false;
    }
    */
}
