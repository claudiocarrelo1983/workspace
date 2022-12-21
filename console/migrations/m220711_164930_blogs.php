<?php

use yii\db\Migration;

/**
 * Class m220711_164930_blogs
 */
class m220711_164930_blogs extends Migration
{
    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'image_instagram' => $this->string(),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string(),
            'alt' => $this->string(),    
            'text_resume' => $this->text(),         
            'text' => $this->text(),          
            'username' => $this->string()->notNull(),           
            'tags' => $this->string()->notNull(),  
            'active' => $this->boolean()->defaultValue(true),            
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }
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
        echo "m220711_164930_blogs cannot be reverted.\n";

        return false;
    }

    public function down()
    {
        $this->dropTable('{{%blogs}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220711_164930_blogs cannot be reverted.\n";

        return false;
    }
    */
}
