<?php

use app\widgets\echarts\EChartAsset;

EChartAsset::register($this);
?>
<div>
    <h4><?= $model['phuong'] ?></h4>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <?php foreach ($model['doanhnghiep']['soluong'] as $item) : ?>
                    <tr>
                        <th><?= $item['name'] ?></th>
                        <td><?= $item['value'] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <?php if (isset($model['doanhnghiep']['loaihinh'])): ?>
            <h3 class="content-heading">Loại hình doanh nghiệp</h3>
                <div id="chartLoaihinh" class="chartStyle"></div>
                <script type="module">
                    $(document).ready(function () {
                        var chartDom = document.getElementById('chartLoaihinh');
                        var myChart = echarts.init(chartDom);
                        var option;

                        option = {
                            title: {
                                text: '',
                                left: 'center'
                            },
                            tooltip: {
                                trigger: 'item'
                            },
                            legend: {
                                orient: 'vertical',
                                left: 'left',
                                top: 'bottom',

                            },
                            series: [{
                                name: 'Doanh nghiệp',
                                type: 'pie',
                                radius: '50%',
                                data: <?= json_encode($model['doanhnghiep']['loaihinh']) ?>,
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }]
                        };

                        option && myChart.setOption(option);
                    });
                </script>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($model['doanhnghiep']['linhvuc'])): ?>
                <h3 class="content-heading">Lĩnh vực</h3>
                <div id="chartLinhvuc" class="chartStyle"></div>
                <script type="module">
                    $(document).ready(function () {
                        var chartDom = document.getElementById('chartLinhvuc');
                        var myChart = echarts.init(chartDom);
                        var option;

                        option = {
                            title: {
                                text: '',
                                left: 'center'
                            },
                            tooltip: {
                                trigger: 'item'
                            },
                            legend: {
                                orient: 'vertical',
                                left: 'left',
                                top: 'bottom',

                            },
                            series: [{
                                name: 'Doanh nghiệp',
                                type: 'pie',
                                radius: '50%',
                                data: <?= json_encode($model['doanhnghiep']['linhvuc']) ?>,
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }]
                        };

                        option && myChart.setOption(option);
                    });
                </script>
            <?php endif;?>
        </div>
    </div>
</div>