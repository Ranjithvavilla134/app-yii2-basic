<?php

use app\themes\adminlte\widgets\Box;
use dosamigos\highcharts\HighCharts;
use app\widgets\chart\ChartJs;
use yii\helpers\Html;

?>

<div class="row" style="display: none;">
    <div class="col-sm-6">
        <?php Box::begin(
            [
                'title' => Html::a(Yii::t('admin', 'Orders'), ['/admin/order']),
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'grid' => 'order-chart'
            ]
        ); ?>
        <div class="chart-block">
        <?= ChartJs::widget([
            'type' => 'Line',
            'options' => [
                'height' => 350,
                //'width' => 400
            ],
            'clientOptions' => [
                'animation' => true,
                'responsive' => true,
                'maintainAspectRatio' => false,
                'legendTemplate' => "<ul class=\"<%=name.toLowerCase()%>-legend\">"
                                    ."<% for (var i=0; i<datasets.length; i++){%>"
                                        ."<li>"
                                            ."<span class=\"legend-block\" style=\"background-color:<%=datasets[i].strokeColor%>\"></span>"
                                            ."<%if(datasets[i].label){%><%=datasets[i].label%><%}%>"
                                        ."</li>"
                                    ."<%}%>"
                                    ."</ul>"
            ],
            'data' => [
                'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                'datasets' => [
                    [
                        'label' => Yii::t('admin', 'Car'),
                        'fillColor' => "rgba(220,220,220,0.5)",
                        'strokeColor' => "rgba(220,220,220,1)",
                        'pointColor' => "rgba(220,220,220,1)",
                        'pointStrokeColor' => "#fff",
                        'data' => [65, 59, 90, 81, 56, 55, 40]
                    ],
                    [
                        'label' => Yii::t('admin', 'Tourism'),
                        'fillColor' => "rgba(151,187,205,0.5)",
                        'strokeColor' => "rgba(151,187,205,1)",
                        'pointColor' => "rgba(151,187,205,1)",
                        'pointStrokeColor' => "#fff",
                        'data' => [28, 48, 40, 19, 96, 27, 100]
                    ]
                ]
            ]
        ]);
        ?>
        </div>
        <?php Box::end(); ?>
    </div>
<!--</div>

<div class="row">-->
    <div class="col-sm-6">
        <?php Box::begin(
            [
                'title' => Html::a(Yii::t('admin', 'Reviews'), ['/admin/review']),
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'grid' => 'review-chart'
            ]
        ); ?>
        <div class="chart-block">
            <?= ChartJs::widget([
                'type' => 'Bar',
                'options' => [
                    'height' => 350,
                    //'width' => 400
                ],
                'clientOptions' => [
                    'animation' => true,
                    'animationEasing' => 'easeOutBounce',
                    'responsive' => true,
                    'maintainAspectRatio' => false,
                    'legendTemplate' => "<ul class=\"<%=name.toLowerCase()%>-legend\">"
                                        ."<% for (var i=0; i<datasets.length; i++){%>"
                                            ."<li>"
                                                ."<span class=\"legend-block\" style=\"background-color:<%=datasets[i].strokeColor%>\"></span>"
                                                ."<%if(datasets[i].label){%><%=datasets[i].label%><%}%>"
                                            ."</li>"
                                        ."<%}%>"
                                        ."</ul>"
                ],
                'data' => [
                    'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                    'datasets' => [
                        [
                            'label' => Yii::t('admin', 'Positive'),
                            'fillColor' => "rgba(161,228,155,0.5)",
                            'strokeColor' => "rgba(192,230,160,1)",
                            'pointColor' => "rgba(220,220,220,1)",
                            'pointStrokeColor' => "#fff",
                            'data' => [65, 59, 90, 81, 56, 55, 40]
                        ],
                        [
                            'label' => Yii::t('admin', 'Negative'),
                            'fillColor' => "rgba(230,190,170,0.5)",
                            'strokeColor' => "rgba(235,180,160,0.7)",
                            'pointColor' => "rgba(151,187,205,1)",
                            'pointStrokeColor' => "#fff",
                            'data' => [28, 48, 40, 19, 96, 27, 100]
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
        <?php Box::end(); ?>
    </div>
</div>

