<?php

use yii\db\Migration;

/**
 * Class m231018_134430_messages
 */
class m231018_134430_messages extends Migration
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
        echo "m231018_134430_messages cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string(),  
            'template_code' => $this->string(),  
            'company_code_location_array' => $this->string(), 
            'genders' => $this->string(),             
            'title' => $this->string(30),   
            'page_code_title' => $this->string()->notNull()->unique(),   
            'page_code_text' => $this->string()->notNull()->unique(),     
            'title_pt' => $this->string(30),        
            'text_pt' => $this->text(160),   
            'title_en' => $this->string(30),
            'text_en' => $this->text(160), 
            'type' => $this->string(),        
            'from_schedule_date' => $this->date(),
            'to_schedule_date' => $this->date(),
            'schedule_hour' => $this->string(), 
            'reminder_number' => $this->integer(),
            'reminder_hours_days' => $this->string(),     
            'language' => $this->string(),
            'stage' => $this->string(),
            'send' => $this->boolean()->defaultValue(0), 
            'error' => $this->string(),
            'active' => $this->boolean()->defaultValue(0), 
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%messages}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231018_134430_messages cannot be reverted.\n";

        return false;
    }
    */
}
