<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use app\models\GoalMilestone;
?>
<div class="goal-objective">
    <?php foreach ($goal->objectives as $objective): ?>
        <div class="row col-md-12">
            <h2>
                <?php
                echo $objective->description . '     ' . Html::a(Yii::t('app', 'Edit'), Url::to(['/goal/edit-objective', 'id' => $objective->id]), ['class' => 'btn btn-default'])
                ;
                ?>
            </h2>
            <p>
                <label><?= Yii::t('app', 'Date') ?>:</label> <?= $objective->date ?>
            </p>
            <p>
                <label><?= Yii::t('goal', 'Evidence') ?>:</label> <?= $objective->evidence ?>
            </p>

            <p>
                <label><?= Yii::t('goal', 'Celebration') ?>:</label> <?= $objective->celebration ?>
            </p>
            <?php foreach ($objective->milestones as $milestone): ?>
                <div class="col-md-push-1 col-md-11">
                    <h3>
                        <?= $milestone->description . '     ' . Html::a(Yii::t('app', 'Edit'), Url::to(['/goal/edit-objective', 'id' => $milestone->id]), ['class' => 'btn btn-default']) ?>
                    </h3>
                    <p>
                        <label><?= Yii::t('app', 'Date') ?>:</label> <?= $milestone->date ?>
                    </p>
                    <p>
                        <label><?= Yii::t('goal', 'Evidence') ?>:</label> <?= $milestone->evidence ?>
                    </p>

                    <p>
                        <label><?= Yii::t('goal', 'Celebration') ?>:</label> <?= $milestone->celebration ?>
                    </p>
                </div>
            <?php endforeach; ?>
            <div class="col-md-push-1 col-md-11">
                <?= Html::a(Yii::t('goal', 'New milestone'), Url::to(['/goal/new-objective', 'id' => $goal->id, 'parentId' => $objective->id]), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>