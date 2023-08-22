<?php

use yii\db\Migration;

/**
 * Class m230615_074248_services
 */
class m230615_074248_services extends Migration
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
        echo "m230615_074248_services cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'company_code' => $this->string()->notNull(),  
            'location_code' => $this->string(),        
            'username' => $this->string()->notNull(),
            'category_code' => $this->string()->notNull(),
            'service_code' => $this->string()->notNull()->unique(),  
            'page_code_title' => $this->string()->notNull()->unique(),   
            'page_code_text' => $this->string()->notNull()->unique(),              
            'title' => $this->string()->notNull(),        
            'text' => $this->text()->notNull(),         
            'title_pt' => $this->string()->notNull(),         
            'text_pt' => $this->text()->notNull(),              
            'title_en' => $this->string()->notNull(), 
            'text_en' => $this->text()->notNull(),      
            'advanced_money' => $this->boolean(),   
            'percentage' => $this->integer(),    
            'price' => $this->integer(), 
            'price_range' => $this->integer(),   
            'time' => $this->integer()->notNull(), 
            'order' => $this->integer(),      
            'active' => $this->boolean(),
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%services}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230615_074248_services cannot be reverted.\n";

        return false;
    }
    */
}
