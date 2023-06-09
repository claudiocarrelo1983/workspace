<?php

use yii\db\Migration;

/**
 * Class m221209_075923_configurations
 */
class m221209_075923_configurations extends Migration
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
        echo "m221209_075923_configurations cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%configurations}}', [
            'id' => $this->primaryKey(),              
            'field' => $this->string()->notNull()->unique(),    
            'active' => $this->boolean()          
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%configurations}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221209_075923_configurations cannot be reverted.\n";

        return false;
    }
    */
}
