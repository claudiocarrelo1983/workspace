<?php

use yii\db\Migration;

/**
 * Class m221109_161608_translations
 */
class m221109_161608_translations extends Migration
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
        echo "m221109_161608_translations cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%translations}}', [
            'id' => $this->primaryKey(),              
            'country_code' => $this->string(), 
            'page' => $this->string(), 
            'page_code' => $this->string(),            
            'text' => $this->text(),  
            'text_pt' => $this->string(), 
            'text_es' => $this->string(), 
            'text_en' => $this->string(), 
            'text_it' => $this->string(), 
            'text_fr' => $this->string(), 
            'text_de' => $this->string(),
            'active' => $this->boolean(),
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%translations}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221109_161608_translations cannot be reverted.\n";

        return false;
    }
    */
}
