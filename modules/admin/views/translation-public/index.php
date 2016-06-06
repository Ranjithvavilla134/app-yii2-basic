<?php

use yii\helpers\Url;
use yii\grid\GridView;
use mistim\theme\adminlte\widgets\Box;
use mistim\theme\adminlte\widgets\grid\ActionColumn;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Url::remember(Url::current());

$this->title = Yii::t('admin', 'Translations');
$this->params['breadcrumbs'][] = $this->title;

$gridId = 'translate-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'message',
        [
            'attribute' => 'translationEn',
            'label'     => Yii::t('admin', 'EN'),
            'value'     => function ($data) {
                foreach ($data->messages as $item) {
                    if ($item->language === 'en') return $item->translation;
                }
            }
        ],
        [
            'attribute' => 'translationRu',
            'label'     => Yii::t('admin', 'RU'),
            'value'     => function ($data) {
                foreach ($data->messages as $item) {
                    if ($item->language === 'ru') return $item->translation;
                }
            }
        ],
        [
            'attribute' => 'translationKz',
            'label'     => Yii::t('admin', 'KZ'),
            'value'     => function ($data) {
                foreach ($data->messages as $item) {
                    if ($item->language === 'kz') return $item->translation;
                }
            }
        ],
    ],
];

$showActions = false;

if (Yii::$app->user->can('/admin/translation-public/view')) {
    $actions[] = '{view}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/admin/translation-public/update')) {
    $actions[] = '{update}';
    $showActions = $showActions || true;
}

if (Yii::$app->user->can('/admin/translation-public/delete')) {
    $actions[] = '{delete}';
    $showActions = $showActions || true;
}

if ($showActions === true) {
    $gridConfig['columns'][] = [
        'class'    => ActionColumn::className(),
        'template' => implode(' ', $actions),
        'contentOptions' => [
            'align' => 'center',
            'width' => '100px'
        ]
    ];
}
?>

<?php //Pjax::begin(['enablePushState' => false, 'timeout' => 10000]); ?>

<div class="row">
    <div class="col-xs-12">
        <?php Box::begin(
            [
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'grid' => $gridId
            ]
        ); ?>
        <?= GridView::widget($gridConfig); ?>
        <?php Box::end(); ?>
    </div>
</div>

<?php //Pjax::end(); ?>