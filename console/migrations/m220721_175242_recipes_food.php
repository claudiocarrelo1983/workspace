<?php

use yii\db\Migration;

/**
 * Class m220721_175242_recipes_food
 */
class m220721_175242_recipes_food extends Migration
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
        echo "m220721_175242_recipes_food cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%recipes_food}}', [
            'id' => $this->primaryKey(),   
            'recipe_code' => $this->string()->notNull(),  
            'page_code' => $this->string()->notNull(),  
            'recipe_food_name' => $this->string()->notNull(),   
            'measure' => $this->string()->notNull(),
            'quantity' => $this->string()->notNull(),            
            'calories' => $this->integer()->notNull(),            
            'colesterol' => $this->integer()->defaultValue(0), 
            'sodium' => $this->integer()->defaultValue(0),      
            'fibers' => $this->integer()->defaultValue(0),
            'sugar' => $this->integer()->defaultValue(0),
            'fat' => $this->integer()->notNull(), 
            'carbs' => $this->integer()->notNull(), 
            'protein' => $this->integer()->notNull(), 
            'recipe_food_pt' => $this->string()->notNull(),        
            'recipe_food_en' => $this->string()->notNull(),
            'active' => $this->boolean(),                   
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%recipes_food}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_175242_recipes_food cannot be reverted.\n";

        return false;
    }
    */
}
