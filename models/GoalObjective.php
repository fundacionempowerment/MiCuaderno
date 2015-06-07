<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class GoalObjective extends ActiveRecord {

    public function __construct() {
        $this->date = date("Y-m-d");
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['goal_id', 'description', 'evidence', 'date', 'celebration'], 'required'],
            [['goal_id', 'description', 'evidence', 'date', 'celebration'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
            'evidence' => Yii::t('goal', 'Evidence'),
            'celebration' => Yii::t('goal', 'Celebration'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getGoal() {
        return $this->hasOne(Goal::className(), ['id' => 'goal_id']);
    }

    public function getMilestones() {
        return $this->hasMany(GoalObjective::className(), ['parent_objective_id' => 'id']);
    }

    public static function getPlan($coachee_id) {
        return GoalObjective::find()
                        ->innerJoin('goal', 'goal.id = goal_objective.goal_id')
                        ->where(['coachee_id' => $coachee_id])
                        ->orderBy('date')
                        ->all();
    }

}
