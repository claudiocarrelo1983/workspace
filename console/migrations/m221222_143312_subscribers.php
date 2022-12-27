<?php

use yii\db\Migration;

/**
 * Class m221222_143312_subscribers
 */
class m221222_143312_subscribers extends Migration
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
        echo "m221222_143312_subscribers cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subscribers}}', [
            'id' => $this->primaryKey(),      
            'first_name' => $this->string(),
            'last_name' => $this->text(), 
            'email' => $this->string()->notNull()->unique(), 
            'opt_in' => $this->boolean(),   
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%subscribers}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221222_143312_subscribers cannot be reverted.\n";

        return false;
    }
    */
}
