<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

class m150501_231226_add_user_tables extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'surname' => Schema::TYPE_STRING . ' NOT NULL',
            'is_coach' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0',
            'coach_id' => Schema::TYPE_INTEGER . ' NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->addForeignKey('fk_user_coach', '{{%user}}', 'coach_id', '{{%user}}', 'id');

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'admin',
            // password is 'admin' but hashed
            'password_hash' => '$2y$13$C30KWvYxAXRIbv35bDVm5unJIhJOSQoQ7vLup3Ys68RFEYO9SY52.',
            'auth_key' => '',
            'email' => 'admin@fake.com',
            'name' => 'Adminitrator',
            'surname' => 'of Cuaderno',
            'is_coach' => true,
            'status' => User::STATUS_ACTIVE,
            'created_at' => 0,
            'updated_at' => 0,
        ]);
    }

    public function down() {
        $this->dropTable('{{%user}}');
    }

}
