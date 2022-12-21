<?php

use yii\db\Migration;

/**
 * Class m220725_174904_forms
 */
class m220725_174904_forms extends Migration
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
        echo "m220725_174904_forms cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%forms}}', [
            'id' => $this->primaryKey(),  
            'username' => $this->string(),
            'company' => $this->string(),
            'type' => $this->string(),
            'title' => $this->string(),    
            'description' => $this->string(), 
            'text' => $this->text(), 
            'image' => $this->text(),           
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%forms}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220725_174904_forms cannot be reverted.\n";

        return false;
    }
    */
}
