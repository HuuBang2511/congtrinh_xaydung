<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import "leaflet";
import "leaflet-measure-ext";
import "leaflet-fullscreen";
import "leaflet.locatecontrol";
import "~/leaflet/leaflet.snogylop.js";
import { measureOptions } from "~/leaflet/config.js";
import { replaceProperties } from "~/utils/formatUtil.js";
import "~/leaflet/L.legend.js";
import "~/leaflet/L.customWMS.js";
import "~/leaflet/L.TileLayer.BetterWMS.js";
import ModalInfo from "./ModalInfo.vue";

const modalUrl = ref("");

function initMap() {
    const map = L.map("map", {
        center: [10.240095, 106.373147],
        zoom: 10,
        minZoom: 10,
        attributionControl: false,
        fullscreenControl: true,
    });
    L.control.measure(measureOptions).addTo(map);
    L.control.locate().addTo(map);
    L.control
        .legend({
            content: APP.legend,
        })
        .addTo(map);
    return map;
}

function initLayerControl(map, bounds, setting) {
    const baseMaps = {
        HCMGIS: L.tileLayer("https://thuduc-maps.hcmgis.vn/thuducserver/gwc/service/wmts?layer=thuduc:thuduc_maps&style=&tilematrixset=EPSG:900913&Service=WMTS&Request=GetTile&Version=1.0.0&Format=image/png&TileMatrix=EPSG:900913:{z}&TileCol={x}&TileRow={y}")
            .addTo(map),
    };

    let overlayMaps = {
        // "Ranh quận huyện": L.tileLayer.wms("/geogis/nongnghiep/wms", {
        //     layers: "nongnghiep:hc_quan",
        // }),
        // "Ranh phường xã": L.tileLayer
        //     .wms("/geogis/nongnghiep/wms", {
        //         layers: "nongnghiep:hc_phuong",
        //         zIndex: 100,
        //     })
        //     .addTo(map),
        // "Nông hộ": L.tileLayer.betterWms(
        //     "/geogis/nongnghiep/wms",
        //     {
        //         layers: "nongnghiep:v_nongho",
        //         zIndex: 50,
        //     },
        //     {
        //         onGetFeatureInfo: (latlng, featureInfo) =>
        //             showPopup({
        //                 map,
        //                 url: `/map/nongho/popup?id={nongho_id}`,
        //                 latlng,
        //                 featureInfo,
        //                 actions: [
        //                     {
        //                         type: "modal",
        //                         title: "Chi tiết",
        //                         url: "/map/nongho/modal?id={nongho_id}",
        //                     },
        //                     {
        //                         type: "link",
        //                         title: "Liên kết",
        //                         url: "/caytrong/nongho/view?id={nongho_id}",
        //                     },
        //                 ],
        //             }),
        //     }
        // ),
        // "KD thuốc BVTV": L.tileLayer.betterWms(
        //     "/geogis/nongnghiep/wms",
        //     {
        //         layers: "nongnghiep:kd_thuoc_bvtv",
        //         zIndex: 60,
        //     },
        //     {
        //         onGetFeatureInfo: (latlng, featureInfo) =>
        //             showPopup({
        //                 map,
        //                 url: "/map/kd-thuoc-bvtv/popup?id={id}",
        //                 latlng,
        //                 featureInfo,
        //                 actions: [
        //                     {
        //                         type: "link",
        //                         title: "Liên kết",
        //                         url: "/caytrong/kd-thuoc-bvtv/view?id={id}",
        //                     },
        //                 ],
        //             }),
        //     }
        // ),
        // "KD nông sản": L.tileLayer.betterWms(
        //     "/geogis/nongnghiep/wms",
        //     {
        //         layers: "nongnghiep:kd_nongsan",
        //         zIndex: 70,
        //     },
        //     {
        //         onGetFeatureInfo: (latlng, featureInfo) =>
        //             showPopup({
        //                 map,
        //                 url: "/map/kd-nongsan/popup?id={id}",
        //                 latlng,
        //                 featureInfo,
        //                 actions: [
        //                     {
        //                         type: "link",
        //                         title: "Liên kết",
        //                         url: "/caytrong/kd-nongsan/view?id={id}",
        //                     },
        //                 ],
        //             }),
        //     }
        // ),
        // "Cơ sở nuôi cá lồng bè": L.tileLayer
        //     .betterWms(
        //         "/geogis/nongnghiep/wms",
        //         {
        //             layers: "nongnghiep:v_coso_nuoicalongbe",
        //             zIndex: 75,
        //         },
        //         {
        //             onGetFeatureInfo: (latlng, featureInfo) =>
        //                 showPopup({
        //                     map,
        //                     url: "/map/coso-nuoicalongbe/popup?id={coso_nuoicalongbe_id}",
        //                     latlng,
        //                     featureInfo,
        //                     actions: [
        //                         {
        //                             type: "link",
        //                             title: "Liên kết",
        //                             url: "/thuysan/coso-nuoicalongbe/view?id={coso_nuoicalongbe_id}",
        //                         },
        //                     ],
        //                 }),
        //         }
        //     )
        //     .addTo(map),
        // "Cơ sở nuôi cá tra": L.tileLayer
        //     .betterWms(
        //         "/geogis/nongnghiep/wms",
        //         {
        //             layers: "nongnghiep:v_coso_nuoicatra",
        //             zIndex: 75,
        //         },
        //         {
        //             onGetFeatureInfo: (latlng, featureInfo) =>
        //                 showPopup({
        //                     map,
        //                     url: "/map/coso-nuoicatra/popup?id={coso_nuoicatra_id}",
        //                     latlng,
        //                     featureInfo,
        //                     actions: [
        //                         {
        //                             type: "link",
        //                             title: "Liên kết",
        //                             url: "/thuysan/coso-nuoicatra/view?id={coso_nuoicatra_id}",
        //                         },
        //                     ],
        //                 }),
        //         }
        //     )
        //     .addTo(map),
        // "Trang trại chăn nuôi heo": L.tileLayer
        //     .betterWms(
        //         "/geogis/nongnghiep/wms",
        //         {
        //             layers: "nongnghiep:v_coso_nuoiheo",
        //             zIndex: 75,
        //         },
        //         {
        //             onGetFeatureInfo: (latlng, featureInfo) =>
        //                 showPopup({
        //                     map,
        //                     url: "/map/coso-nuoiheo/popup?id={coso_nuoiheo_id}",
        //                     latlng,
        //                     featureInfo,
        //                     actions: [
        //                         {
        //                             type: "link",
        //                             title: "Liên kết",
        //                             url: "/channuoi/coso-nuoiheo/view?id={coso_nuoiheo_id}",
        //                         },
        //                     ],
        //                 }),
        //         }
        //     )
        //     .addTo(map),
        // "Ranh thửa đất": L.tileLayer
        //     .wms("/geogis/caytrong/wms", {
        //         layers: "caytrong:v_ranhthua",
        //         zIndex: 40,
        //     })
        //     .addTo(map),
        // "Thửa đất": L.tileLayer.betterWms(
        //     "/geogis/caytrong/wms",
        //     {
        //         layers: "caytrong:v_ranhthua",
        //         styles: "v_thuadat",
        //         zIndex: 30,
        //     },
        //     {
        //         onGetFeatureInfo: (latlng, featureInfo) =>
        //             showPopup({
        //                 map,
        //                 url: "/map/thuadat/popup?id={id}",
        //                 latlng,
        //                 featureInfo,
        //                 actions: [
        //                     {
        //                         type: "link",
        //                         title: "Liên kết",
        //                         url: "/caytrong/pg-ranhthua/view?id={id}",
        //                     },
        //                 ],
        //             }),
        //     }
        // ),
    };

    if (setting.maquan != null) {
        delete overlayMaps['Ranh quận huyện'];
    }

    L.control.layers(baseMaps, overlayMaps, { autoZIndex: false }).addTo(map);
}

function initOverlapLayer(map) {
    L.geoJSON(JSON.parse(APP.bounds), {
        invert: true,
        renderer: L.svg({ padding: 1 }),
        style: {
            color: "white",
            fillOpacity: 1,
        },
    }).addTo(map);
}

async function showPopup({ map, url, latlng, featureInfo, actions = [] }) {
    if (featureInfo?.features?.length == 0) return;
    const properties = featureInfo.features[0].properties;
    url = replaceProperties(url, properties);

    try {
        const { data } = await axios.get(url);
        let content = data.toString();
        actions.forEach(({ type, title, url }) => {
            url = replaceProperties(url, properties);
            if (type == "modal") {
                modalUrl.value = url;
                content += `<a href="#" data-bs-target="#modalInfo" data-bs-toggle="modal" class="me-2">${title}</a>`;
            } else if (type == "link") {
                content += `<a href="${url}" target="_blank">${title}</a>`;
            } else {
                console.log(`${type} is not supported`);
            }
        });
        L.popup({ maxWidth: 500, minWidth: 300 })
            .setLatLng(latlng)
            .setContent(content)
            .openOn(map);
    } catch (error) {
        console.error(error.message);
    }
}

onMounted(() => {
    const bounds = L.geoJSON(JSON.parse(APP.bounds)).getBounds();
    const setting = JSON.parse(APP.settingPhamvi);
    const map = initMap();
    initLayerControl(map, bounds, setting);
    // initOverlapLayer(map);
    map.fitBounds(bounds);
});
</script>

<template>
    <div id="map" class="block block-rounded mb-0"></div>
    <ModalInfo :url="modalUrl"> </ModalInfo>
</template>

<style lang="scss">
@import "leaflet/dist/leaflet.css";
@import "leaflet-measure-ext/dist/leaflet-measure.css";
@import "leaflet-fullscreen/dist/leaflet.fullscreen.css";
@import "leaflet.locatecontrol/dist/L.Control.Locate.min.css";

// Core
#map {
    height: calc(100vh - 9rem);
    width: 100%;
}

.content {
    padding: 1rem !important;
}

.pop-body {
    max-height: 400px;
    overflow: auto;
}

// Messure
.leaflet-control-measure {
    h3 {
        font-size: 1.17rem !important;
    }
}

// Custom leaflet
.leaflet-popup-content {
    font-family: var(--bs-body-font-family);
    font-size: var(--bs-body-font-size);
    line-height: var(--bs-body-line-height);
}
</style>
