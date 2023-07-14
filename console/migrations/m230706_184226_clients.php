<?php

use yii\db\Migration;

/**
 * Class m230706_184226_clients
 */
class m230706_184226_clients extends Migration
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
        echo "m230706_184226_clients cannot be reverted.\n";

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
            'id' => $this->primaryKey()->unique(),
            'guid' => $this->string()->unique(),
            'username' => $this->string()->notNull()->unique(),
            'contact_number' => $this->string(), 
            'email' => $this->string()->notNull()->unique(), 
            'nif' => $this->string(),   
            'first_name' => $this->string(),
            'last_name' => $this->string(),    
            'full_name' => $this->string(),   
            'gender' => $this->string(),     
            'title' => $this->string(),  
            'path' => $this->string(),  
            'dob' => $this->date(),     
            'image' => $this->string(),     
            'company_code' => $this->string(),   
            'starting_date' => $this->date(),
            'payment_month_fee' => $this->string(),
            'payment_year_fee' => $this->string(),           
            'offer' => $this->string(),        
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'language' => $this->string(),                  
            'address' => $this->string(),      
            'postcode' => $this->string(),
            'location' => $this->string(),
            'country' => $this->string(),         
            'voucher' => $this->string(),            
            'terms_and_conditions' => $this->boolean(),
            'gdpr' => $this->boolean(),
            'privacy' => $this->boolean(),
            'newsletter' => $this->boolean(),     
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),      
            'active' => $this->boolean(),
            'created_at' => $this->integer()->notNull(),       
            'updated_at' => $this->integer()->notNull(),
            'subscription' => $this->string(),
            'subscription_startingdate' => $this->date(),
            'created_date' => $this->timestamp(), 
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
        echo "m230706_184226_clients cannot be reverted.\n";

        return false;
    }
    */
}
