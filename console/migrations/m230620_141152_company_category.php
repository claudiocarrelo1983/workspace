<?php

use yii\db\Migration;

/**
 * Class m230620_141152_company_category
 */
class m230620_141152_company_category extends Migration
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
        echo "m230620_141152_company_category cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company_category}}', [
            'id' => $this->primaryKey(),
            'company_code' => $this->string()->notNull(),         
            'category_code' => $this->string()->notNull(),     
            'page_code_title' => $this->string()->notNull()->unique(),            
            'title' => $this->string(),   
            'title_pt' => $this->string(),
            'title_en' => $this->string(),        
            'order' => $this->integer(), 
            'active' => $this->boolean(),
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%company_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230620_141152_company_category cannot be reverted.\n";

        return false;
    }
    */
}
