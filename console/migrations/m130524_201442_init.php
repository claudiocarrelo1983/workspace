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
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),         
            'name' => $this->string(),
            'company' => $this->string(),
            'level' => $this->string(),
            'sublevel' => $this->string(),
            'email' => $this->string()->notNull()->unique(), 
            'type' => $this->string(),       
            'description' => $this->text(),
            'address' => $this->string(),      
            'postcode' => $this->string(),
            'location' => $this->string(),
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
            'active' => $this->boolean(),
            'code' => $this->string()->unique(),            
            'terms_and_conditions' => $this->boolean(),
            'privacy' => $this->boolean(),
            'newsletter' => $this->boolean(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
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
