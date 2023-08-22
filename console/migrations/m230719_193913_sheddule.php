<?php

use yii\db\Migration;

/**
 * Class m230719_193913_sheddule
 */
class m230719_193913_sheddule extends Migration
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
        echo "m230719_193913_sheddule cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sheddule}}', [
            'id' => $this->primaryKey(),   
            'team_username' => $this->string()->notNull(),
            'client_username' => $this->string()->notNull(),      
            'company_code' => $this->string()->notNull(), 
            'location_code' => $this->string()->notNull(), 
            'service_code' => $this->string()->notNull(), 
            'service_name' => $this->string()->notNull(), 
            'canceled' => $this->boolean()->defaultValue(0), 
            'confirm' => $this->boolean()->defaultValue(0), 
            'full_name' => $this->string()->notNull(),   
            'contact_number' => $this->string()->notNull(),  
            'email' => $this->string(),  
            'nif' => $this->string(), 
            'date' => $this->date(),
            'time' => $this->time(),
            'paid' => $this->boolean(), 
            'cost' => $this->integer(), 
            'username_guid' => $this->string(),  
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%sheddule}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230719_193913_sheddule cannot be reverted.\n";

        return false;
    }
    */
}
