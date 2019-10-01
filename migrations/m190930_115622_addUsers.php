<?php

use yii\db\Migration;

/**
 * Class m190930_115622_addUsers
 */
class m190930_115622_addUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'user_name' => 'Александр',
            'password' => 'alex1234alex',
            'email' => 'alex1234@mail.com',
            'authKey' => 'test102key',
            'accessToken' => '102-token',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->insert('users', [
            'user_name' => 'Иван',
            'password' => 'ivan1234ivan',
            'email' => 'ivan1234@mail.com',
            'authKey' => 'test103key',
            'accessToken' => '103-token',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->insert('users', [
            'user_name' => 'Анна',
            'password' => 'anna1234anna',
            'email' => 'anna1234@mail.com',
            'authKey' => 'test104key',
            'accessToken' => '104-token',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190930_115622_addUsers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_115622_addUsers cannot be reverted.\n";

        return false;
    }
    */
}
