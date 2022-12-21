<?php

use yii\db\Migration;

/**
 * Class m220722_114612_company_details
 */
class m220722_114612_company_details extends Migration
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
        echo "m220722_114612_company_details cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company_details}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string(),
            'logo' => $this->string(),          
            'url_code' => $this->string()->unique(),          
            'text' => $this->text(),
            'extternal_url' => $this->string(),
            'facebook' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'linkedin' => $this->string(),
            'youtube' => $this->string(),      
            'created_date' => $this->timestamp()       
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%company_details}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220722_114612_company_details cannot be reverted.\n";

        return false;
    }
    */
}
