<?php

use yii\db\Migration;

/**
 * Class m230315_230346_events
 */
class m230315_230346_events extends Migration
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
        echo "m230315_230346_events cannot be reverted.\n";

        return false;
    }

 
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }       

        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'company_code' => $this->string()->notNull(),
            'event_code' => $this->string()->notNull(),         
            'company_code_location' => $this->string()->notNull(),     
            'template_code' => $this->string()->notNull(),      
            'path' => $this->string(),
            'image' => $this->string(),      
            'title' => $this->string(),
            'page_code_title' => $this->string()->notNull()->unique(),   
            'page_code_text' => $this->string()->notNull()->unique(),  
            'title_pt' => $this->string(),
            'text_pt' => $this->text(),
            'title_en' => $this->string(),
            'text_en' => $this->text(),         
            'frequency' => $this->string()->notNull(),
            'start_day' => $this->dateTime()->notNull(),
            'end_day' => $this->dateTime()->notNull(),
            'start_hour' => $this->dateTime()->notNull(),
            'end_hour' => $this->dateTime()->notNull(),
            'number_or_hours' => $this->integer(),
            'cost' => $this->integer(),
            'max_num_people' => $this->integer(),                   
            'url' => $this->string(),  
            'login_required' => $this->boolean()->defaultValue(true),      
            'active' => $this->boolean()->defaultValue(true),  
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%events}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230315_230346_events cannot be reverted.\n";

        return false;
    }
    */
}
