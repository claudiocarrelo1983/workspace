<?php

use yii\db\Migration;

/**
 * Class m221223_171909_recipes_category
 */
class m221223_171909_recipes_category extends Migration
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
        echo "m221223_171909_recipes_category cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%recipes_category}}', [
            'id' => $this->primaryKey(),
            'recipes_parent_id' => $this->string()->defaultValue(0), 
            'page_code' => $this->string()->notNull()->unique(),   
            'recipe_cat_code' => $this->string()->notNull()->unique(),         
            'description' => $this->string()->notNull(), 
            'recipe_pt' => $this->string()->notNull(),          
            'recipe_en' => $this->string()->notNull(),  
            'order' => $this->integer(),    
            'active' => $this->boolean(),                     
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%recipes_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221223_171909_recipes_category cannot be reverted.\n";

        return false;
    }
    */
}
