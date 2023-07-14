<?php

use yii\db\Migration;

/**
 * Class m230111_142840_team
 */
class m230111_142840_team extends Migration
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
        echo "m230111_142840_team cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'company_code' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'page_code_title' => $this->string()->notNull()->unique(),   
            'page_code_text' => $this->string()->notNull()->unique(),  
            'title' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'contact_number' => $this->string(),  
            'email' => $this->string(), 
            'path' => $this->string(),
            'image' => $this->string(),     
            'location' => $this->string()->notNull(), 
            'job_title' => $this->string()->notNull(),        
            'text' => $this->text(), 
            'title_pt' => $this->string(),         
            'text_pt' => $this->text(),      
            'title_en' => $this->string(), 
            'text_en' => $this->text(),         
            'website' => $this->string(),
            'facebook' => $this->string(),
            'pinterest' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'tiktok' => $this->string(),
            'linkedin' => $this->string(),
            'youtube' => $this->string(),           
            'color' => $this->string(),
            'order' => $this->integer(),              
            'active' => $this->boolean(),
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%team}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230111_142840_team cannot be reverted.\n";

        return false;
    }
    */
}
