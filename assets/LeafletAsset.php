<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class LeafletAsset extends AssetBundle
{

    public $css = [
        ['https://unpkg.com/leaflet@1.9.3/dist/leaflet.css', 'integrity' => "sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=", 'crossorigin' => ""]
    ];
    public $js = [
        ['https://unpkg.com/leaflet@1.9.3/dist/leaflet.js', 'integrity' => "sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=", 'crossorigin' => ""],
    ];

    public $jsOptions = ['position' => View::POS_HEAD];
}
