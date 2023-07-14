<?php

use yii\db\Migration;

/**
 * Class m230620_133921_company_locations
 */
class m230620_133921_company_locations extends Migration
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
        echo "m230620_133921_company_locations cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company_locations}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string(),    
            'location_code' => $this->string()->unique(),
            'page_code_title' => $this->string()->notNull()->unique(),  
            'page_code_description' => $this->string()->notNull()->unique(),  
            'title_pt' => $this->string(),         
            'description_pt' => $this->text(),              
            'title_en' => $this->string(), 
            'description_en' => $this->text(),   
            'full_name' => $this->string(),
            'description' => $this->text(),           
            'cae' => $this->string(),           
            'contact_number' => $this->string(),  
            'email' => $this->string(),     
            'sheddule_array' => $this->text(),                    
            'address_line_1' => $this->string(),    
            'address_line_2' => $this->string(),     
            'city' => $this->string(),  
            'postcode' => $this->string(),
            'location' => $this->string(),
            'language' => $this->string(),
            'country' => $this->string(),           
            'google_location' => $this->text(), 
            'active' => $this->boolean(), 
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%company_locations}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230620_133921_company_locations cannot be reverted.\n";

        return false;
    }
    */
}
