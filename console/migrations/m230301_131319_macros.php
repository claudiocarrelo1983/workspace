<?php

use yii\db\Migration;

/**
 * Class m230301_131319_macros
 */
class m230301_131319_macros extends Migration
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
        echo "m230301_131319_macros cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%macros}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
            'calories' => $this->integer()->notNull(),
            'protein' => $this->integer()->notNull(),
            'carbs' => $this->integer()->notNull(),
            'lipids' => $this->integer()->notNull(),     
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%macros}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230301_131319_macros cannot be reverted.\n";

        return false;
    }
    */
}
