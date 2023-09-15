<?php

use yii\db\Migration;

/**
 * Class m220725_175347_subjects
 */
class m220725_175347_subjects extends Migration
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
        echo "m220725_175347_subjects cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subjects}}', [
            'id' => $this->primaryKey(),  
            'type' => $this->string()->notNull(),  
            'company_code' => $this->string()->notNull(),    
            'position' => $this->string()->notNull(),           
            'page_code' => $this->string()->notNull(),  
            'subject' => $this->string()->notNull(),  
            'text_pt' => $this->string()->notNull(),       
            'text_en' => $this->string()->notNull(),   
            'order' => $this->integer()->notNull(),
            'active' => $this->integer()->defaultValue(1),  
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%subjects}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220725_175347_subjects cannot be reverted.\n";

        return false;
    }
    */
}
