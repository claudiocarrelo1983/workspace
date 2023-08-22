<?php

use yii\db\Migration;

/**
 * Class m230620_133908_company
 */
class m230620_133908_company extends Migration
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
        echo "m230620_133908_company cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string()->unique(),    
            'company_code_url' => $this->string(),            
            'company_name' => $this->string(),
            'path' => $this->string(),
            'image' => $this->string(),     
            'page_code_text' => $this->string()->notNull()->unique(),
            'page_code_team_title' => $this->string()->notNull()->unique(),
            'page_code_team_text' => $this->string()->notNull()->unique(),
            'text' => $this->text(),
            'text_pt' => $this->text(), 
            'team_title_pt' => $this->string(),   
            'team_text_pt' => $this->text(),       
            'text_en' => $this->text(),  
            'team_title_en' => $this->string(),   
            'team_text_en' => $this->text(),      
            'nif' => $this->string(),
            'cae' => $this->string(),   
            'email_1' => $this->string(),
            'email_2' => $this->string(),        
            'contact_number_1' => $this->string(),
            'contact_number_2' => $this->string(),
            'contact_number_3' => $this->string(),
            'address_line_1' => $this->string(),    
            'address_line_2' => $this->string(),  
            'website' => $this->string(),
            'facebook' => $this->string(),
            'pinterest' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'tiktok' => $this->string(),
            'linkedin' => $this->string(),
            'youtube' => $this->string(),                     
            'city' => $this->string(),  
            'postcode' => $this->string(),
            'location' => $this->string(),
            'country' => $this->string(), 
            'sheddule_array' => $this->text(),         
            'color' => $this->string(),   
            'template' => $this->string(),    
            'coin' => $this->string(),   
            'publish' => $this->boolean()->defaultValue(0),   
            'active' => $this->boolean()->defaultValue(1), 
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230620_133908_company cannot be reverted.\n";

        return false;
    }
    */
}
