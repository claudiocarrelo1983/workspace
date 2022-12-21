<?php

use yii\db\Migration;

/**
 * Class m221115_144301_companys_levels
 */
class m221115_144301_companys_levels extends Migration
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
        echo "m221115_144301_companys_levels cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%companys_levels}}', [
            'id' => $this->primaryKey(),              
            'company_code' => $this->string()->notNull(),      
            'role' => $this->string()->notNull(), 
            'level' => $this->string()->notNull(), 
            'sublevel' => $this->string()->notNull(), 
            'name' => $this->string()->notNull(),
            'order' => $this->integer(),    
            'text' => $this->text()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%companys_levels}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221115_144301_companys_levels cannot be reverted.\n";

        return false;
    }
    */
}
