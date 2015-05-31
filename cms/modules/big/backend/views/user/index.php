<?php
/**
 * @link http://www.bigbrush-agency.com/
 * @copyright Copyright (c) 2015 Big Brush Agency ApS
 * @license http://www.bigbrush-agency.com/license/
 */

use yii\helpers\Html;
use yii\grid\GridView;

$stateOptions = $model->getStateOptions();
Yii::$app->toolbar->add();

$title = Yii::t('cms', 'Users');
$this->title = Yii::$app->id . ' | ' . $title;
?>
<div class="row">
    <div class="col-md-12">
        <h1><?= $title ?></h1>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-hover'],
            'columns' => [
                [
                    'header' => Yii::t('cms', 'Username'),
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a(Html::encode($data->username), ['edit', 'id' => $data->id]);
                    }
                ],
                [
                    'header' => Yii::t('cms', 'Name'),
                    'options' => ['width' => '20%'],
                    'value' => function($data) {
                        return Html::encode($data->name);
                    }
                ],
                [
                    'header' => Yii::t('cms', 'Email'),
                    'options' => ['width' => '20%'],
                    'value' => function($data) {
                        return Html::encode($data->email);
                    }
                ],
                [
                    'header' => Yii::t('cms', 'State'),
                    'options' => ['width' => '5%'],
                    'value' => function($data) use ($stateOptions) {
                        return Html::encode($data->getStateText());
                    }
                ],
            ],
        ]); ?>
    </div>
</div>