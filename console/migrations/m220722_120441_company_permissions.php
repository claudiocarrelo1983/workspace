<?php

use yii\db\Migration;

/**
 * Class m220722_120441_company_permissions
 */
class m220722_120441_company_permissions extends Migration
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
        echo "m220722_120441_company_permissions cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company_permissions}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string(),
            'company_level' => $this->string(),         
            'role' => $this->string(),      
            'name' => $this->string(),         
            'created_date' => $this->timestamp()       
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%company_permissions}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220722_120441_company_permissions cannot be reverted.\n";

        return false;
    }
    */
}
