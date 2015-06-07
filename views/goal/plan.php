<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use app\models\GoalMilestone;

$this->title = Yii::t('goal', 'Action plan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'My Coachees'), 'url' => ['/coachee']];
$this->params['breadcrumbs'][] = ['label' => $coachee->fullname, 'url' => ['/coachee/view', 'id' => $coachee->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-plan">
    <h1><?= Html::encode($this->title) ?>    <?= Yii::$app->request->get('printable') == null ? Html::a(Yii::t('app', 'Printable'), Url::to(['/goal/plan', 'coachee_id' => $coachee->id, 'printable' => 1]), ['class' => 'btn btn-default']) : '' ?></h1>

    <p>
        <?= Yii::t('user', 'Coach') ?>: <?= Html::label($coachee->coach->fullname) ?><br />
        <?= Yii::t('user', 'Coachee') ?>: <?= Html::label($coachee->fullname) ?><br />
    </p>
    <?php foreach ($objectives as $objective): ?>
        <div class="row col-md-12">
            <?=
            $objective['parent_objective_id'] > 0 ?
                    Html::tag('h3', Yii::t('goal', 'Milestone: ') . $objective['description']) :
                    Html::tag('h2', Yii::t('goal', 'Objective: ') . $objective['description'])
            ?>
            <p>
                <label><?= Yii::t('app', 'Date') ?>:</label> <?= $objective['date'] ?>
            </p>
            <p>
                <label><?= Yii::t('goal', 'Evidence') ?>:</label> <?= $objective['evidence'] ?>
            </p>

            <p>
                <label><?= Yii::t('goal', 'Celebration') ?>:</label> <?= $objective['celebration'] ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>