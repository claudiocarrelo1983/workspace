<?php

use yii\db\Migration;

/**
 * Class m220725_164124_pricing
 */
class m220725_164124_pricing extends Migration
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
        echo "m220725_164124_pricing cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pricing}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->unique(),
            'coin' => $this->string()->unique(),
            'key' => $this->string()->unique(),      
            'standard' => $this->integer(), 
            'professional' => $this->integer(),    
            'enterprise' => $this->integer(),
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }
 

    public function down()
    {
        $this->dropTable('{{%pricing}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220725_164124_pricing cannot be reverted.\n";

        return false;
    }
    */
}
