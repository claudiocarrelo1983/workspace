<?php

use yii\db\Migration;

/**
 * Class m221216_134740_pricing_specs
 */
class m221216_134740_pricing_specs extends Migration
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
        echo "m221216_134740_pricing_specs cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pricing_specs}}', [
            'id' => $this->primaryKey(),    
            'type' => $this->string()->notNull(),          
            'page_code' => $this->string()->notNull()->unique(),  
            'description' => $this->string()->notNull(), 
            'text_pt' => $this->string()->notNull(), 
            'text_es' => $this->string()->notNull(), 
            'text_en' => $this->string()->notNull(), 
            'text_it' => $this->string()->notNull(), 
            'text_fr' => $this->string()->notNull(), 
            'text_de' => $this->string()->notNull(),
            'order' => $this->integer()->notNull(), 
            'active' => $this->boolean(),
            'created_date' => $this->timestamp()         
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%pricing_specs}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221216_134740_pricing_specs cannot be reverted.\n";

        return false;
    }
    */
}
