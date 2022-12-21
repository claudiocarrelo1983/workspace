<?php

use yii\db\Migration;

/**
 * Class m220721_170745_nutricion_food
 */
class m220721_170745_nutricion_food extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%nutricion_food}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'group' => $this->string()->notNull(),
            'calories' => $this->string()->notNull(),
            'energy' => $this->string()->defaultValue(0),
            'fat' => $this->string()->defaultValue(0),
            'protein' => $this->string()->defaultValue(0),
            'carbs' => $this->string()->defaultValue(0),
            'lipids_saturated' => $this->string()->defaultValue(0),
            'lipids_unsaturated' => $this->string()->defaultValue(0),
            'lipids_monoglycerides' => $this->string()->defaultValue(0),
            'sugars' => $this->string()->defaultValue(0),
            'fibers' => $this->string()->defaultValue(0),
            'sodium' => $this->string()->defaultValue(0),
            'calcium' => $this->string()->defaultValue(0),  
            'iron' => $this->string()->defaultValue(0), 
            'cholesterol' => $this->string()->defaultValue(0),            
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220721_170745_nutricion_food cannot be reverted.\n";

        return false;
    }

    public function down()
    {
        $this->dropTable('{{%nutricion_food}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_170745_nutricion_food cannot be reverted.\n";

        return false;
    }
    */
}
