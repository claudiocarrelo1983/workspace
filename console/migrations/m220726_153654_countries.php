<?php

use yii\db\Migration;

/**
 * Class m220726_153654_countries
 */
class m220726_153654_countries extends Migration
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
        echo "m220726_153654_countries cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%countries}}', [
            'id' => $this->primaryKey(),  
            'country_code' => $this->string(),     
            'small_title' => $this->string(), 
            'full_title' => $this->string(),    
            'img' => $this->string(),    
            'active' => $this->boolean(),            
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%countries}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220726_153654_countries cannot be reverted.\n";

        return false;
    }
    */
}
