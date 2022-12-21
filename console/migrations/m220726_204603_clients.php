<?php

use yii\db\Migration;

/**
 * Class m220726_204603_clients
 */
class m220726_204603_clients extends Migration
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
        echo "m220726_204603_clients cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),  
            'username' => $this->string(),    
            'first_name' => $this->string(),
            'last_name' => $this->string(),         
            'name' => $this->string(),
            'email' => $this->string(),
            'dob' => $this->date(),
            'company' => $this->string(),   
            'gender' => $this->string('1'),   
            'level' => $this->string(),
            'sublevel' => $this->string(),
            'contact_number' => $this->string(),
            'text' => $this->text(),    
            'auth_key' => $this->string(),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string(),         
            'active' => $this->boolean(),
            'terms_and_conditions' => $this->boolean(),
            'newsletter' => $this->boolean(),
            'created_date' => $this->timestamp()  
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%clients}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220726_204603_clients cannot be reverted.\n";

        return false;
    }
    */
}
