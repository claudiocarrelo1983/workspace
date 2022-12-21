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
            'recipes_id' => $this->integer(),
            'food_id' => $this->integer(),             
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
