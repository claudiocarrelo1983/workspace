<?php

use yii\db\Migration;

/**
 * Class m230315_194424_calendar
 */
class m230315_194424_calendar extends Migration
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
        echo "m230315_194424_calendar cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%calendar}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'start' => $this->date()->notNull(),
            'end' => $this->date()->notNull(),
            'allDay' => $this->boolean(),
            'url' => $this->string(),
            'className' => $this->string()->notNull(),            
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%calendar}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230315_194424_calendar cannot be reverted.\n";

        return false;
    }
    */
}
