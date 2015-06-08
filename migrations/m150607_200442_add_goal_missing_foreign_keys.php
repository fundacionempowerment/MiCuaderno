<?php

use yii\db\Schema;
use yii\db\Migration;

class m150607_200442_add_goal_missing_foreign_keys extends Migration {

    public function up() {
        $this->addForeignKey('fk_goal_user', '{{%goal}}', 'coachee_id', '{{%user}}', 'id');
        $this->addForeignKey('fk_goal_objective_goal', '{{%goal_objective}}', 'goal_id', '{{%goal}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_goal_resource_goal', '{{%goal_resource}}', 'goal_id', '{{%goal}}', 'id', 'CASCADE');
    }

    public function down() {
        $this->dropForeignKey('fk_goal_user', '{{%goal}}');
        $this->dropForeignKey('fk_goal_resource_goal', '{{%goal_resource}}');
        $this->dropForeignKey('fk_goal_objective_goal', '{{%goal_objective}}');
    }

}
