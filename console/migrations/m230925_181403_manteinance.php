<?php

use yii\db\Migration;

/**
 * Class m230925_181403_manteinance
 */
class m230925_181403_manteinance extends Migration
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
        echo "m230925_181403_manteinance cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%manteinance}}', [
            'id' => $this->primaryKey(),      
            'type' => $this->string(), 
            'company_code' => $this->string(),  
            'template_code' => $this->string(),    
            'title' => $this->string(50),   
            'page_code_title' => $this->string()->notNull()->unique(),   
            'page_code_text' => $this->string()->notNull()->unique(),  
            'title_pt' => $this->string(30),        
            'text_pt' => $this->text(160),   
            'title_en' => $this->string(30),
            'text_en' => $this->text(160), 
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%messages_template}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230925_181403_manteinance cannot be reverted.\n";

        return false;
    }
    */
}
