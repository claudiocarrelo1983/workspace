<?php

use yii\db\Migration;

/**
 * Class m230315_230346_events
 */
class m230315_230346_events extends Migration
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
        echo "m230315_230346_events cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'company_code' => $this->string()->notNull(),
            'event_code' => $this->string()->notNull(),
            'page_code' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'title_pt' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'color_code' => $this->string()->notNull(),
            'frequency' => $this->string()->notNull(),
            'start' => $this->dateTime()->notNull(),
            'end' => $this->dateTime(),
            'allDay' => $this->boolean()->defaultValue(true),
            'url' => $this->string(),
            'className' => $this->string(),  
            'active' => $this->boolean()->defaultValue(true),  
            'created_date' => $this->timestamp(), 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%events}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230315_230346_events cannot be reverted.\n";

        return false;
    }
    */
}
