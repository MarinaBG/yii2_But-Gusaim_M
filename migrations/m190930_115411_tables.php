<?php

use yii\db\Migration;

/**
 * Class m190930_115411_tables
 */
class m190930_115411_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activities', [
            'id_activity' => $this->primaryKey(),
            'activity_name' => $this->string(64)->notNull(),
            'date_start' => $this->date(),
            'date_end' => $this->date(),
            'user_id' => $this->integer(),
            'comment' => $this->text(250),
            'blocking' => $this->integer(),
            'repeat' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createTable('users', [
            'id_user' => $this->primaryKey(),
            'user_name' => $this->string(64)->notNull(),
            'password' => $this->string(),
            'email' => $this->string(32),
            'authKey' => $this->string(32),
            'accessToken' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-post-user_id',
            'activities',
            'user_id',
            'users',
            'id_user',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activities');
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_115411_tables cannot be reverted.\n";

        return false;
    }
    */
}
