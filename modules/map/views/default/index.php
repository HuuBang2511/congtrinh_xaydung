<?php

use app\assets\Vite;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\widgets\maps\LeafletMapAsset;
use app\widgets\maps\plugins\leafletlocate\LeafletLocateAsset;
use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;

LeafletMapAsset::register($this);
\app\widgets\maps\plugins\leafletprint\PrintMapAsset::register($this);
\app\widgets\maps\plugins\markercluster\MarkerClusterAsset::register($this);
\app\widgets\maps\plugins\leaflet_measure\LeafletMeasureAsset::register($this);
LeafletLocateAsset::register($this);

$this->title = 'Bản đồ';
$this->params['hideHero'] = true;
?>
<style>
    #map {
        width: 100%;
        height: 100vh;
    }
</style>
<?php $this->beginBlock('block-filter'); ?>
<?php foreach ($model['linhvuc'] as $i => $item) : ?>
    <button type="button" class="btn btn-sm btn-alt-primary" onclick="filterDonvikinhteLinhvuc(<?= $item['id'] ?>)"><?= $item['ten_cap1'] ?></button>
<?php endforeach; ?>
<?php $this->endBlock(); ?>
<div class="row mx-0">
    <?php $this->beginBlock('block-search'); ?>
    <div class="col-lg-12 px-0 py-0">
        <div class="block block-themed">

            <div class="block-content tab-content px-0">
                <div class="tab-pane active" id="btabs-donvikinhte" role="tabpanel" aria-labelledby="btabs-donvikinhte-tab" tabindex="0">
                    <div class="block px-3">
                        <?php $form = ActiveForm::begin() ?>
                        <div class="row pb-1">
                            <div class="col-lg-4 col-form-label">Tên</div>
                            <div class="col-lg-8">
                                <?= $form->field($searchModel, 'ten', [
                                    'options' => ['class' => 'mb-1']
                                ])->input('text', ['id' => 'ten'])->label(false) ?>
                            </div>
                        </div>
                        <div class="row pb-1">
                            <div class="col-lg-4 col-form-label">Số nhà</div>
                            <div class="col-lg-8">
                                <?= $form->field($searchModel, 'sonha', [
                                    'options' => ['class' => 'mb-1']
                                ])->input('text', ['id' => 'sonha'])->label(false) ?>
                            </div>
                        </div>
                        <div class="row pb-1">
                            <div class="col-lg-4 col-form-label">Tên đường</div>
                            <div class="col-lg-8">
                                <?= $form->field($searchModel, 'tenduong', [
                                    'options' => ['class' => 'mb-1']
                                ])->input('text', ['id' => 'tenduong'])->label(false) ?>
                            </div>
                        </div>
                        <div class="row pb-1">
                            <div class="col-lg-4 col-form-label">Tổ dân phố</div>
                            <div class="col-lg-8">
                                <?= $form->field($searchModel, 'todanpho', [
                                    'options' => ['class' => 'mb-1']
                                ])->widget(DepDrop::class, [
                                    'options' => ['id' => 'todanpho'],
                                    'type' => DepDrop::TYPE_SELECT2,
                                    'select2Options' => ['pluginOptions' => ['allowClear' => true, 'placeholder' => 'Chọn tổ dân phố']],
                                    'pluginOptions' => [
                                        'depends' => ['phuong'],
                                        'url' => Url::to(['/map/donvihanhchinh/list-todanpho']),
                                        'loadingText' => '...',
                                    ]
                                ])->label(false) ?>
                            </div>
                        </div>

                        
                        <div class="row pb-1">
                            <div class="col-lg-4 col-form-label">Phường</div>
                            <div class="col-lg-8">
                                <?= $form->field($searchModel, 'phuongxa', [
                                    'options' => ['class' => 'mb-1']
                                ])->widget(Select2::class, [
                                    'data' => ArrayHelper::map($model['ranhphuong'], 'id', 'ten'),
                                    'options' => [
                                        'id' => 'phuong',
                                        'prompt' => 'Chọn phường'
                                    ]
                                ])->label(false) ?>
                            </div>
                        </div>
                        <div class="row pb-1">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary float-right w-100" onclick="initSearch()"><span class="fa fa-search"></span> Tìm kiếm
                                </button>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>

                    <div class="block">
                        <div id='list'></div>
                    </div>
                </div>
                <div class="tab-pane" id="btabs-thongtinchitiet" role="tabpanel" aria-labelledby="btabs-thongtinchitiet-tab" tabindex="0">
                    <div class="block px-3">
                        <div id='div-thongtinchitiet'></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->endBlock(); ?>
    <div class="col-lg-12 px-0 py-0">
        <div id="map">


        </div>
    </div>
</div>

<script>
    var defined = {
        layer_dvkt: "Đơn vị kinh tế",
        layer_street: "Đường",
        layer_ward: "Phường",
    };
    var DATA = {
        HomeUrl: "<?= Yii::$app->homeUrl ?>",
        MapConfig: {
            mapId: "map",
            defaultCenter: [10.764208357781946, 106.64855336515308],
            defaultZoom: 13,
            defaultConfig: {
                maxZoom: 25,
                zoomControl: false,
            },
            baseLayers: ["HCMGIS"],
            overLayers: ['KTVHXH'],
            activeLayers: ["HCMGIS"],
            initOthers: [],

        },
        MapLayer: {
            baselayer: {},
            overlayers: {},
        },
        MapControl: {},
        Refs: {
            Markers: [],
            LeafletLayers: {
                "HCMGIS": L.tileLayer('https://thuduc-maps.hcmgis.vn/thuducserver/gwc/service/wmts?layer=thuduc:thuduc_maps&style=&tilematrixset=EPSG:900913&Service=WMTS&Request=GetTile&Version=1.0.0&Format=image/png&TileMatrix=EPSG:900913:{z}&TileCol={x}&TileRow={y}', {
                    maxZoom: 25,
                    minZoom: 10,
                    attribution: 'HCMGIS'
                }),
                "GoogleMap": L.tileLayer('http://{s}.google.com/vt/lyrs=' + 'r' + '&x={x}&y={y}&z={z}', {
                    maxZoom: 24,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }),
                "GoogleSatellite": L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 24,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                }),
                "KTVHXH": L.tileLayer.wms('https://geoserver.hcmgis.vn/geoserver/quan11_quanlydonvikinhte/wms?', {
                    layers: 'quan11_quanlydonvikinhte:diem_ktvhxh',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                    minZoom: 12,
                }),
            }
        }
    };
    $(document).ready(function() {
        initMap();
        initList();
        $('#btabs-donvikinhte-tab').removeClass('active');
    });

    function initMap(config) {
        if (typeof(config) == 'undefined') {
            config = DATA.MapConfig;
        }

        DATA[config.mapId] = {};
        DATA[config.mapId].Map = new L.Map(config.mapId, config.defaultConfig);
        DATA[config.mapId].Map.setView(config.defaultCenter, config.defaultZoom);
        group = L.featureGroup().addTo(DATA[config.mapId].Map);
        DATA[config.mapId].MapControl = {};
        DATA[config.mapId].MapLayer = {
            baseLayers: {},
            overLayers: {}
        };
        initMapLayer(config);
        initMapControl(config);
        initOther(config);

    }

    function initMapLayer(config) {
        config.baseLayers.map(function(layer) {
            DATA[config.mapId].MapLayer.baseLayers[layer] = DATA.Refs.LeafletLayers[layer];
        });
        config.overLayers.map(function(layer) {
            DATA[config.mapId].MapLayer.overLayers[layer] = DATA.Refs.LeafletLayers[layer];
        });
        config.activeLayers.map(function(layer) {
            DATA.Refs.LeafletLayers[layer].addTo(DATA[config.mapId].Map);
        });
    }

    function initMapControl(config) {
        initControlMapLayer(config);
        initControlZoom(config);
        initControlLocate(config);
        initControlMeasure(config);
        initControlScale(config);
    }

    function initOther(config) {
        config = DATA.MapConfig;
        config.initOthers.map(function(func) {
            func(config)
        });
    }

    function initControlZoom(config) {
        L.control.zoom({
            position: 'bottomright'
        }).addTo(DATA[config.mapId].Map);
    }

    function initControlLocate(config) {
        L.control.locate({
            position: 'bottomright',
            icon: 'fa fa-location',
        }).addTo(DATA[config.mapId].Map);
    }

    function initControlMapLayer(config) {
        DATA[config.mapId].MapControl.layercontrol = L.control.layers(DATA[config.mapId].MapLayer.baseLayers, DATA[config.mapId].MapLayer.overLayers, {position: 'bottomright'});
        DATA[config.mapId].MapControl.layercontrol.addTo(DATA[config.mapId].Map);
    }

    function initGeojsonLayer(config) {
        showResultsOnMap('', '', '','', '', '', '');
    }

    function initList() {
        loadAjaxList(DATA.HomeUrl + 'map/default/list');
        initSearch();
    }

    function initSearch() {
        var ten = $('#ten').val();
        var sonha = $('#sonha').val();
        var tenduong = $('#tenduong').val();
        var todanpho = $('#todanpho').val();
        var phuongxa = $('#phuong').val();
        loadAjaxList(DATA.HomeUrl + 'map/default/list?ten={0}&sonha={1}&tenduong={2}&todanpho={3}&phuong={4}'
            .replace('{0}', ten)
            .replace('{1}', sonha)
            .replace('{2}', tenduong)
            .replace('{3}', todanpho)
            .replace('{4}', phuongxa)
        );
        highlightStreet(tenduong);
        if (todanpho == '') {

            highlightWard(phuongxa);
        } else {
            highlightSubquarter(todanpho);
        }
        showResultsOnMap(ten, sonha, tenduong, todanpho, phuongxa, '', '');
    }

    function showResultsOnMap(ten, sonha, tenduong, todanpho, phuongxa, loaidonvikinhte, linhvuc) {
        var currentMap = DATA[DATA.MapConfig.mapId].Map;
        var currentMapControl = DATA[DATA.MapConfig.mapId].MapControl;
        var layerDVKT = DATA.Refs.LeafletLayers[defined.layer_dvkt];

        if ((typeof layerDVKT !== 'undefined') && currentMap.hasLayer(layerDVKT)) {
            currentMap.removeLayer(layerDVKT);
            currentMapControl.layercontrol.removeLayer(layerDVKT);
        }

        $.ajax({
            url: DATA.HomeUrl + 'map/default/geojson',
            dataType: 'json',
            data: {
                'ten': ten,
                'sonha': sonha,
                'tenduong': tenduong,
                'todanpho': todanpho,
                'phuongxa': phuongxa,
                'loaidonvikinhte': loaidonvikinhte,
                'linhvuc': linhvuc,
            },
            success: function(data) {
                var markers = L.markerClusterGroup({
                    spiderfyOnMaxZoom: true,
                    showCoverageOnHover: true,
                    zoomToBoundsOnClick: true,
                    disableClusteringAtZoom: 19,
                });
                data.map(function(item) {
                    var url = 'https://auth.hcmgis.vn/uploads/icon/shop-64.png';
                    var icon = L.icon({
                        iconUrl: url,
                        iconSize: [40, 40],
                        iconAnchor: [20, 30],
                        popupAnchor: [0, -48],
                    });
                    var marker = new L.marker([item.geo_y, item.geo_x], {
                        'icon': icon
                    });
                    marker.on('click', function() {
                        viewDetail(item.geo_x, item.geo_y, item.id);
                    });

                    markers.addLayer(marker);
                });
                DATA.Refs.LeafletLayers[defined.layer_dvkt] = markers;
                DATA[DATA.MapConfig.mapId].Map.addLayer(markers);
                DATA[DATA.MapConfig.mapId].MapControl.layercontrol.addOverlay(markers, defined.layer_dvkt);
            }
        });
    }

    function highlightStreet(street) {
        if (typeof street != 'undefined') {
            var currentMap = DATA[DATA.MapConfig.mapId].Map;
            var currentMapControl = DATA[DATA.MapConfig.mapId].MapControl;
            $.ajax({
                url: DATA.HomeUrl + 'map/default/get-street-geojson',
                data: {
                    'street': street
                },
                dataType: 'json',
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                },
                success: function(data) {
                    var myStyle = {
                        "color": "#0665d0",
                        "weight": 6,
                        "opacity": 0.7
                    };
                    var polygon = L.geoJSON(data, {
                        style: myStyle
                    });

                    if (typeof DATA.Refs.LeafletLayers[defined.layer_street] != 'undefined' && currentMap.hasLayer(DATA.Refs.LeafletLayers[defined.layer_street])) {
                        currentMap.removeLayer(DATA.Refs.LeafletLayers[defined.layer_street]);
                    }
                    DATA.Refs.LeafletLayers[defined.layer_street] = polygon;
                    DATA[DATA.MapConfig.mapId].Map.addLayer(polygon);
                    if (typeof data[0] != 'undefined') {
                        mapZoomAndPanTo(data[0].properties.geo_y, data[0].properties.geo_x, 15);
                    }
                }
            });
        }

    }

    function highlightWard(ward) {
        if (typeof ward != 'undefined') {
            var currentMap = DATA[DATA.MapConfig.mapId].Map;
            var currentMapControl = DATA[DATA.MapConfig.mapId].MapControl;
            $.ajax({
                url: DATA.HomeUrl + 'map/default/get-ward-geojson',
                data: {
                    'ward': ward
                },
                dataType: 'json',
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                },
                success: function(data) {
                    var myStyle = {
                        "fillColor": "rgba(87,211,245,0.4)",
                        "color": "#0665d0",
                        "weight": 6,
                        "opacity": 0.7
                    };
                    var polygon = L.geoJSON(data, {
                        style: myStyle,
                    }).on('click', function(e) {
                        Dashmix.layout('side_overlay_open');
                        $.ajax({
                            url: DATA.HomeUrl + 'map/default/get-ward-detail',
                            data: {
                                'ward': ward
                            },
                            success: function(html) {
                                $('#content-aside').empty().append(html);
                            }
                        });
                    });

                    if (typeof DATA.Refs.LeafletLayers[defined.layer_ward] != 'undefined' && currentMap.hasLayer(DATA.Refs.LeafletLayers[defined.layer_ward])) {
                        currentMap.removeLayer(DATA.Refs.LeafletLayers[defined.layer_ward]);
                    }
                    DATA.Refs.LeafletLayers[defined.layer_ward] = polygon;
                    DATA[DATA.MapConfig.mapId].Map.addLayer(polygon);
                    if (typeof data[0] != 'undefined') {
                        mapZoomAndPanTo(data[0].properties.geo_y, data[0].properties.geo_x, 15);
                    }
                }
            });
        }

    }

    function highlightSubquarter(subquarter) {
        if (typeof subquarter != 'undefined') {
            var currentMap = DATA[DATA.MapConfig.mapId].Map;
            var currentMapControl = DATA[DATA.MapConfig.mapId].MapControl;
            $.ajax({
                url: DATA.HomeUrl + 'map/default/get-subquarter-geojson',
                data: {
                    'subquarter': subquarter
                },
                dataType: 'json',
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                },
                success: function(data) {
                    var myStyle = {
                        "fillColor": "rgba(87,211,245,0.4)",
                        "color": "#0665d0",
                        "weight": 6,
                        "opacity": 0.7
                    };
                    var polygon = L.geoJSON(data, {
                        style: myStyle,
                    });

                    if (typeof DATA.Refs.LeafletLayers[defined.layer_ward] != 'undefined' && currentMap.hasLayer(DATA.Refs.LeafletLayers[defined.layer_ward])) {
                        currentMap.removeLayer(DATA.Refs.LeafletLayers[defined.layer_ward]);
                    }
                    DATA.Refs.LeafletLayers[defined.layer_ward] = polygon;
                    DATA[DATA.MapConfig.mapId].Map.addLayer(polygon);
                    if (typeof data[0] != 'undefined') {
                        mapZoomAndPanTo(data[0].properties.geo_y, data[0].properties.geo_x, 15);
                    }
                }
            });
        }

    }

    function loadAjaxList(url) {
        var div = $('#list');
        $.ajax({
            url: url,
            success: function(html) {
                div.empty().append(html);
                initPagingAjaxList();
            }
        });
    }

    function initPagingAjaxList() {
        $('.pagination li a').on('click', function(e) {
            e.preventDefault();
            var _this = $(this);
            var url = _this.attr('href');
            loadAjaxList(url);
            return false;
        });
    }

    function mapZoomAndPanTo(x, y, zoom) {
        DATA[DATA.MapConfig.mapId].Map.flyTo([x, y], zoom, {
            animate: true,
            easeLinearity: 4
        });
    }

    function initControlMeasure(config) {
        var measureControl = new L.Control.Measure({
            position: 'bottomright',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: undefined,
            primaryAreaUnit: 'sqmeters',
            decPoint: ',',
            thousandsSep: '.'
        });
        measureControl.addTo(DATA[config.mapId].Map);
    }

    function initControlScale(config) {
        L.control.scale().addTo(DATA[config.mapId].Map);
    }

    function viewDetail(x, y, id) {
        $('#btabs-donvikinhte-tab').removeClass('active');
        $('#btabs-donvikinhte').removeClass('active');
        $('#btabs-thongtinchitiet-tab').addClass('active');
        $('#btabs-thongtinchitiet').addClass('active');

        $.ajax({
            url: DATA.HomeUrl + 'map/default/get?id=' + id,
            success: function(html) {
                $('#div-thongtinchitiet').empty().append(html);
            }
        });
        mapZoomAndPanTo(y, x, 19);
        focusCircleLayer(x, y);

    }

    function focusCircleLayer(x, y) {
        var currentMap = DATA[DATA.MapConfig.mapId].Map;
        if (typeof DATA.MapLayer.focuscirclelayer != 'undefined' && currentMap.hasLayer(DATA.MapLayer.focuscirclelayer)) {
            currentMap.removeLayer(DATA.MapLayer.focuscirclelayer);
        }
        DATA.MapLayer.focuscirclelayer = L.circleMarker([y, x], {
            radius: 30,
            fillColor: "green",
            color: "#4fae50",
            weight: 0.5,
            opacity: 1,
            fillOpacity: 0.2
        });
        DATA[DATA.MapConfig.mapId].Map.addLayer(DATA.MapLayer.focuscirclelayer);
    }

    function goBackTab() {
        $('#btabs-donvikinhte-tab').addClass('active');
        $('#btabs-donvikinhte').addClass('active');
        $('#btabs-thongtinchitiet-tab').removeClass('active');
        $('#btabs-thongtinchitiet').removeClass('active');
    }

    function resizeMap() {
        setTimeout(function() {
            DATA[DATA.MapConfig.mapId].Map.invalidateSize();
        }, 400);

    }

    function filterDonvikinhte(type) {
        var ten = $('#ten').val();
        var sonha = $('#sonha').val();
        var tenduong = $('#tenduong').val();
        var todanpho = $('#todanpho').val();
        var phuongxa = $('#phuong').val();
        showResultsOnMap(ten, sonha, tenduong, todanpho, phuongxa, type, '');
        loadAjaxList(DATA.HomeUrl + 'map/default/list?ten={0}&sonha={1}&tenduong={2}&todanpho={3}&phuong={4}&loaidonvikinhte={5}'
            .replace('{0}', ten)
            .replace('{1}', sonha)
            .replace('{2}', tenduong)
            .replace('{3}', todanpho)
            .replace('{4}', phuongxa)
            .replace('{5}', type)
        );
    }

    function filterDonvikinhteLinhvuc(type) {
        var ten = $('#ten').val();
        var sonha = $('#sonha').val();
        var tenduong = $('#tenduong').val();
        var todanpho = $('#todanpho').val();
        var phuongxa = $('#phuong').val();
        showResultsOnMap(ten, sonha, tenduong, todanpho, phuongxa, '', type);
        loadAjaxList(DATA.HomeUrl + 'map/default/list?ten={0}&sonha={1}&tenduong={2}&todanpho={3}&phuong={4}&loaidonvikinhte={5}&linhvuc={6}'
            .replace('{0}', ten)
            .replace('{1}', sonha)
            .replace('{2}', tenduong)
            .replace('{3}', todanpho)
            .replace('{4}', phuongxa)
            .replace('{5}', '')
            .replace('{6}', type)
        );
    }
</script>