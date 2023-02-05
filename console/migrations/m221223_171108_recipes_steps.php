<?php

use yii\db\Migration;

/**
 * Class m221223_171108_recipes_steps
 */
class m221223_171108_recipes_steps extends Migration
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
        echo "m221223_171108_recipes_steps cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%recipes_steps}}', [
            'id' => $this->primaryKey(),         
            'recipe_code' => $this->string()->notNull(),  
            'page_code' => $this->string()->notNull(),  
            'recipe_step_text' => $this->text()->notNull(),    
            'recipe_step_text_pt' => $this->text()->notNull(),         
            'recipe_step_text_en' => $this->text()->notNull(),       
            'order' => $this->integer(),      
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%recipes_steps}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221223_171108_recipes_steps cannot be reverted.\n";

        return false;
    }
    */
}
