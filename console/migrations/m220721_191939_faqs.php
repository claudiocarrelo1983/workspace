<?php

use yii\db\Migration;

/**
 * Class m220721_191939_faqs
 */
class m220721_191939_faqs extends Migration
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
        echo "m220721_191939_faqs cannot be reverted.\n";

        return false;
    }
    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%faqs}}', [
            'id' => $this->primaryKey(),     
            'category' => $this->string(),             
            'position' => $this->string()->notNull(),
            'question' => $this->string(),
            'page_code_question' => $this->string()->notNull()->unique(),  
            'page_code_answer' => $this->string()->notNull()->unique(),  
            'answer' => $this->text(),
            'question_pt' => $this->string(), 
            'answer_pt' => $this->text(), 
            'question_en' => $this->string(), 
            'answer_en' => $this->text(), 
            'order' => $this->integer()->notNull(),
            'created_date' => $this->timestamp()       
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%faqs}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_191939_faqs cannot be reverted.\n";

        return false;
    }
    */
}
