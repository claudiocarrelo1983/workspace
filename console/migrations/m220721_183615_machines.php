<?php

use yii\db\Migration;

/**
 * Class m220721_183615_machines
 */
class m220721_183615_machines extends Migration
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
        echo "m220721_183615_machines cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%machines}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'code' => $this->string()->notNull()->unique(),
            'designacao' => $this->string(128)->notNull(),
            'peso' => $this->string(2)->notNull(),    
            'url' => $this->string(128)->notNull(),       
            'created_date' => $this->timestamp() 
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%machines}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_183615_machines cannot be reverted.\n";

        return false;
    }
    */
}
