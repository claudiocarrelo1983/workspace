<?php

use yii\db\Migration;

/**
 * Class m220711_164930_blogs
 */
class m220711_164930_blogs extends Migration
{
    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs}}', [
            'id' => $this->primaryKey(),         
            'page_code_title' => $this->string()->notNull()->unique(),  
            'page_code_description' => $this->string()->notNull()->unique(),  
            'page_code_subtitle' => $this->string()->notNull()->unique(),  
            'page_code_text' => $this->string()->notNull()->unique(),   
            'url' => $this->string(),  
            'path' => $this->string(),  
            'image' => $this->string(),
            'image_instagram' => $this->string(),
            'title' => $this->string()->notNull(), 
            'alt' => $this->string(),                   
            'text' => $this->text()->notNull(),  
            'tags' => $this->string()->notNull(),  
            'subtitle' => $this->string(),   
            'title_pt' => $this->string(38)->notNull(), 
            'subtitle_pt' => $this->string()->notNull(), 
            'description_pt' => $this->string(370)->notNull(), 
            'text_pt' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),          
            'title_en' => $this->string(38)->notNull(), 
            'subtitle_en' => $this->string()->notNull(),    
            'description_en' => $this->string(370)->notNull(),     
            'text_en' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'), 
            'username' => $this->string(),            
            'publish' => $this->boolean()->defaultValue(true), 
            'order' => $this->integer(),            
            'active' => $this->boolean()->defaultValue(true),            
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }
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
        echo "m220711_164930_blogs cannot be reverted.\n";

        return false;
    }

    public function down()
    {
        $this->dropTable('{{%blogs}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220711_164930_blogs cannot be reverted.\n";

        return false;
    }
    */
}
