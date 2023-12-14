<?php

use yii\db\Migration;

/**
 * Class m231211_102051_company_images
 */
class m231211_102051_company_images extends Migration
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
        echo "m231211_102051_company_images cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company_images}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string(),  
            'alt' => $this->string(),
            'path' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),      
            'active' => $this->boolean()->defaultValue(1), 
            'order' => $this->integer(),   
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%company_images}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231211_102051_company_images cannot be reverted.\n";

        return false;
    }
    */
}
