<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use app\models\GoalMilestone;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

if ($objective->parent_objective_id > 0)
    $this->title = $objective->id == 0 ? Yii::t('goal', 'New milestone') : Yii::t('goal', 'Editing milestone');
else
    $this->title = $objective->id == 0 ? Yii::t('goal', 'New objective') : Yii::t('goal', 'Editing objective');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'My Coachees'), 'url' => ['/coachee']];
$this->params['breadcrumbs'][] = ['label' => $goal->coachee->fullname, 'url' => ['/coachee/view', 'id' => $goal->coachee->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('goal', 'Goal - ') . $goal->name, 'url' => ['/goal/view', 'id' => $goal->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objective-form">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin([ 'id' => 'objective-form']); ?>
            <?= $form->field($objective, 'description') ?>
            <?=
            $form->field($objective, 'date')->widget(DatePicker::classname(), [ 'options' => ['placeholder' => \Yii::t('goal', 'Select milestone date ...')],
                'value' => $objective->date,
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true, 'format' => 'yyyy/mm/dd'
                ]
            ])
            ?>
            <?= $form->field($objective, 'evidence') ?>
            <?= $form->field($objective, 'celebration') ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), [ 'class' => 'btn btn-primary']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>