<?php

use yii\db\Migration;

/**
 * Class m220721_180509_recipes_plans
 */
class m220721_180509_recipes_plans extends Migration
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
        echo "m220721_180509_recipes_plans cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%recipes_plan}}', [
            'id' => $this->primaryKey(),  
            'recipes_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'subtitle' => $this->string(),
            'text' => $this->string(),        
            'active' => $this->boolean(),               
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%recipes_plan}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_180509_recipes_plans cannot be reverted.\n";

        return false;
    }
    */
}
