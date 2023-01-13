<?php

use yii\db\Migration;

/**
 * Class m220721_174752_recipes
 */
class m220721_174752_recipes extends Migration
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
        echo "m220721_174752_recipes cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%recipes}}', [
            'id' => $this->primaryKey(),
            'guid' => $this->string(),  
            'username' => $this->string(),   
            'fatsecret_id' => $this->integer(),    
            'recipe_code' => $this->string()->notNull()->unique(),     
            'recipe_code_title' => $this->string()->notNull()->unique(), 
            'recipe_code_text' => $this->string()->notNull()->unique(), 
            'difficulty' => $this->string()->notNull(),   
            'image' => $this->string(),
            'recipe_title' => $this->string()->notNull()->unique(),
            'recipe_text' => $this->text()->notNull(),  
            'recipe_cat_code' => $this->string(),
            'cooking_time' => $this->integer()->notNull(),
            'number_of_people' => $this->integer()->notNull(),  
            'recipe_title_pt' => $this->string()->notNull(), 
            'recipe_text_pt' => $this->text()->notNull(), 
            'recipe_title_es' => $this->string()->notNull(), 
            'recipe_text_es' => $this->text()->notNull(), 
            'recipe_title_en' => $this->string()->notNull(), 
            'recipe_text_en' => $this->text()->notNull(), 
            'recipe_title_it' => $this->string()->notNull(), 
            'recipe_text_it' => $this->text()->notNull(), 
            'recipe_title_fr' => $this->string()->notNull(), 
            'recipe_text_fr' => $this->text()->notNull(), 
            'recipe_title_de' => $this->string()->notNull(), 
            'recipe_text_de' => $this->text()->notNull(),     
            'active' => $this->boolean(),      
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%recipes}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_174752_recipes cannot be reverted.\n";

        return false;
    }
    */
}
