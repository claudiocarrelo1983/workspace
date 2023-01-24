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
            'guid' => $this->string(),  
            'page_code_title' => $this->string()->notNull()->unique(),  
            'page_code_subtitle' => $this->string()->notNull()->unique(),  
            'page_code_text' => $this->string()->notNull()->unique(),     
            'image' => $this->string(),
            'image_instagram' => $this->string(),
            'title' => $this->string()->notNull(), 
            'alt' => $this->string(),                   
            'text' => $this->text()->notNull(),  
            'tags' => $this->string()->notNull(),  
            'subtitle' => $this->string(),   
            'title_pt' => $this->string()->notNull(), 
            'subtitle_pt' => $this->string()->notNull(), 
            'text_pt' => $this->text()->notNull(), 
            'title_es' => $this->string()->notNull(), 
            'subtitle_es' => $this->string()->notNull(), 
            'text_es' => $this->text()->notNull(), 
            'title_en' => $this->string()->notNull(), 
            'subtitle_en' => $this->string()->notNull(), 
            'text_en' => $this->text()->notNull(), 
            'title_it' => $this->string()->notNull(), 
            'subtitle_it' => $this->string()->notNull(), 
            'text_it' => $this->text()->notNull(), 
            'title_fr' => $this->string()->notNull(), 
            'subtitle_fr' => $this->string()->notNull(), 
            'text_fr' => $this->text()->notNull(), 
            'title_de' => $this->string()->notNull(), 
            'subtitle_de' => $this->string()->notNull(), 
            'text_de' => $this->text()->notNull(),  
            'username' => $this->string(),          
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
