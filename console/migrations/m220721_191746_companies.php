<?php

use yii\db\Migration;

/**
 * Class m220721_191746_companies
 */
class m220721_191746_companies extends Migration
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
        echo "m220721_191746_companies cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),   
            'first_name' => $this->string(), 
            'last_name' => $this->string(), 
            'full_name' => $this->string(), 
            'gender' => $this->string('1'), 
            'title' => $this->string(), 
            'foto' => $this->string(), 
            'nif' => $this->string(),
            'email' => $this->string(), 
            'contact_number' => $this->string(), 
            'dob' => $this->date(),
            'logo' => $this->string(),  
            'team_code' => $this->string()->unique(), 
            'team_name' => $this->string()->unique(),  
            'summary' => $this->string(100), 
            'description' => $this->text(),
            'role' => $this->string(),
            'level' => $this->string(),
            'sublevel' => $this->string(),       
            'address' => $this->string(),      
            'postcode' => $this->string(),
            'location' => $this->string(),
            'country' => $this->string(),
            'language' => $this->string(),
        
            'website' => $this->string(),
            'facebook' => $this->string(),
            'pinterest' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'tiktok' => $this->string(),
            'linkedin' => $this->string(),
            'youtube' => $this->string(),  

            'gdpr' => $this->boolean(),
            'terms_and_conditions' => $this->boolean(),
            'newsletter' => $this->boolean(),

            'active' => $this->boolean(), 
            'order' => $this->integer(),                   
            'created_date' => $this->timestamp()         
           
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%companies}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_191746_companies cannot be reverted.\n";

        return false;
    }
    */
}
