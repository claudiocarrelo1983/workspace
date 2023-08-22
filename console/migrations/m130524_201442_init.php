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
            'id' => $this->primaryKey()->unique(),
            'guid' => $this->string()->unique(),
            'username' => $this->string()->notNull()->unique(),  
            'voucher' => $this->string(),
            'voucher_parent' => $this->string(),              
            'first_name' => $this->string(),
            'last_name' => $this->string(),    
            'full_name' => $this->string(),   
            'gender' => $this->string(),     
            'title' => $this->string(),    
            'user_title' => $this->string(),
            'user_text' => $this->text(),
            'page_code_title' => $this->string()->notNull()->unique(),   
            'page_code_text' => $this->string()->notNull()->unique(), 
            'title_pt' => $this->string(),         
            'text_pt' => $this->text(),      
            'title_en' => $this->string(), 
            'text_en' => $this->text(),    
            'job_title' => $this->string(),
            'path' => $this->string(),
            'image' => $this->string(),      
            'dob' => $this->date(),              
            'company_dob' => $this->date(),  
            'company_code_parent' => $this->string(), 
            'company_code_url' => $this->string(),         
            'company_code' => $this->string(),     
            'company' => $this->string(),
            'service' => $this->string(),
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
            'adress_line_1' => $this->string(),   
            'adress_line_2' => $this->string(),  
            'city' => $this->string(),  
            'postcode' => $this->string(),            
            'location_code' => $this->string(),
            'location' => $this->string(),
            'country' => $this->string(),
            'nif' => $this->string(),
            'logo' => $this->string(),   
            'sheddule_array' => $this->text(),  
            'time_window' => $this->integer(),    
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
            'created_at' => $this->integer()->notNull(),       
            'updated_at' => $this->integer()->notNull(),
            'subscription' => $this->string(),
            'subscription_startingdate' => $this->date(),
            'color' => $this->string(),
            'order' => $this->integer(),              
            'active' => $this->boolean(),
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }    

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
