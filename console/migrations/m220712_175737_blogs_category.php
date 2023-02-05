<?php

use yii\db\Migration;

/**
 * Class m220712_175737_blogs_category
 */
class m220712_175737_blogs_category extends Migration
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
        echo "m220712_175737_blogs_category cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs_category}}', [
            'id' => $this->primaryKey(),
            'tag_parent_id' => $this->string()->defaultValue(0),  
            'tag' => $this->string()->notNull()->unique(),          
            'page_code' => $this->string()->notNull()->unique(),  
            'description' => $this->string()->notNull(), 
            'text_pt' => $this->string()->notNull(),
            'text_en' => $this->string()->notNull(),          
            'order' => $this->integer(),
            'active' => $this->boolean()->defaultValue(true),                   
            'created_date' => $this->timestamp()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%blogs_category}}');
    }

    /*

    				'tag', 
																'url', 
																'description', 
																'subtitle', 													
																'created_date' 

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220712_175737_blogs_category cannot be reverted.\n";

        return false;
    }
    */
}
