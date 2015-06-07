<?php

use yii\db\Schema;
use yii\db\Migration;

class m150607_194351_change_goal_details extends Migration {

    public function up() {
        $this->renameTable('{{%goal_milestone}}', '{{%goal_objective}}');
        $this->dropColumn('{{%goal_objective}}', 'type');
        $this->addColumn('{{%goal_objective}}', 'parent_objective_id', Schema::TYPE_INTEGER . ' NULL');
        $this->addForeignKey('fk_goal_objective_parent', '{{%goal_objective}}', 'parent_objective_id', '{{%goal_objective}}', 'id', 'RESTRICT');
    }

    public function down() {
        $this->dropForeignKey('fk_goal_objective_parent', '{{%goal_objective}}');
        $this->dropColumn('{{%goal_objective}}', 'parent_objective_id');
        $this->addColumn('{{%goal_objective}}', 'type', Schema::TYPE_INTEGER . ' DEFAULT 0 NOT NULL');
        $this->renameTable('{{%goal_objective}}', '{{%goal_milestone}}');
    }

}
