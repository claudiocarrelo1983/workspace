<?php

use yii\db\Migration;

/**
 * Class m220722_223505_texts
 */
class m220722_223505_texts extends Migration
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
        echo "m220722_223505_texts cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%texts}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->unique(),
            'page_code_title' => $this->string()->unique(),
            'page_code_text' => $this->string()->unique(),
            'title' => $this->string(),            
            'text' => $this->text(),
            'title_pt' => $this->string()->notNull(),
            'text_pt' =>  $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'), 
            'title_en' => $this->string()->notNull(),
            'text_en' => $this->text()->notNull(),         
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%texts}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220722_223505_texts cannot be reverted.\n";

        return false;
    }
    */
}
