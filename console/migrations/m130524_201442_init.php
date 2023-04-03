<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->string()->primaryKey()->unique(),
            //'guid' => $this->string(),
            'username' => $this->string()->notNull()->unique(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),    
            'full_name' => $this->string(),   
            'gender' => $this->string(),     
            'title' => $this->string(),   
            'height_meters' => $this->string(), 
            'height_ft' => $this->string(), 
            'path' => $this->string(),   
            'image' => $this->string(),      
            'dob' => $this->date(),              
            'company_dob' => $this->date(),  
            'company_code_parent' => $this->string(), 
            'company_code_url' => $this->string()->unique(),         
            'company_code' => $this->string()->unique(),     
            'company' => $this->string(),
            'starting_date' => $this->date(),
            'payment_month_fee' => $this->string(),
            'payment_year_fee' => $this->string(),      
            'role' => $this->string(),  
            'level' => $this->string(),
            'sublevel' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'language' => $this->string(),
            'email' => $this->string()->notNull()->unique(), 
            'type' => $this->string(),           
            'summary' => $this->string(),  
            'description' => $this->text(),
            'address' => $this->string(),      
            'postcode' => $this->string(),
            'location' => $this->string(),
            'country' => $this->string(),
            'nif' => $this->string(),
            'logo' => $this->string(),      
            'website' => $this->string(),
            'facebook' => $this->string(),
            'pinterest' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'tiktok' => $this->string(),
            'linkedin' => $this->string(),
            'youtube' => $this->string(), 
            'contact_number' => $this->string(),         
            'code' => $this->string()->unique(),            
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
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
