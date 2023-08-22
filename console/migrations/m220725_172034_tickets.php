<?php

use yii\db\Migration;

/**
 * Class m220725_172034_tickets
 */
class m220725_172034_tickets extends Migration
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
        echo "m220725_172034_tickets cannot be reverted.\n";

        return false;
    }
    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tickets}}', [
            'id' => $this->primaryKey(),  
            'ticket_number'=> $this->string()->unique(),
            'company_code'=> $this->string(), 
            'username_code'=> $this->string(), 
            'type'=> $this->string(), 
            'full_name' => $this->string(),    
            'contact_number' => $this->string(), 
            'email' => $this->string(),            
            'subject' => $this->string(),            
            'text' => $this->text(),
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%tickets}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220725_172034_tickets cannot be reverted.\n";

        return false;
    }
    */
}
