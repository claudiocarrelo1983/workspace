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
            'username' => $this->string()->notNull()->unique(),
            'full_name' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),     
            'location' => $this->string()->notNull(), 
            'title' => $this->string()->notNull(),        
            'text' => $this->string()->notNull(), 
            'title_pt' => $this->string()->notNull(),         
            'text_pt' => $this->string()->notNull(), 
            'title_es' => $this->string()->notNull(),      
            'text_es' => $this->string()->notNull(), 
            'title_en' => $this->string()->notNull(), 
            'text_en' => $this->string()->notNull(), 
            'title_it' => $this->string()->notNull(),          
            'text_it' => $this->string()->notNull(), 
            'title_fr' => $this->string()->notNull(),          
            'text_fr' => $this->string()->notNull(), 
            'title_de' => $this->string()->notNull(),      
            'text_de' => $this->string()->notNull(),         
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
