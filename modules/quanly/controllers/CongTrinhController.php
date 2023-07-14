<?php

namespace app\modules\quanly\controllers;

use Yii;
use app\modules\quanly\models\CongTrinh;
use app\modules\quanly\models\CongTrinhSearch;
use app\modules\services\UtilityService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\db\Query;
use yii\web\Session;
use app\modules\base\BaseController;
use app\modules\danhmuc\models\DmLoaidat;
use app\modules\danhmuc\models\DmTinhtrangCongtrinh;
use app\modules\danhmuc\models\DmLoaicongtrinh;
use app\modules\quanly\models\ChuDauTu;
use app\modules\quanly\models\CoquanThamdinh;
use app\modules\quanly\models\DonviPheduyet;
use app\modules\quanly\models\RanhHuyen;
use app\modules\quanly\models\RanhXa;
use app\modules\quanly\models\CongtrinhThaydoi;
use yii\base\Model;
use app\modules\quanly\models\CongtrinhTimeline;
use app\modules\danhmuc\models\DmLoaigiayphep;
use app\modules\danhmuc\models\DmTinhtrangGiayphep;
use app\modules\quanly\models\DonviCapphep;


/**
 * CongTrinhController implements the CRUD actions for CongTrinh model.
 */
class CongTrinhController extends BaseController
{

    public $const;

    public function init()
    {
        parent::init();
        $this->const = [
            'title' => 'Công trình',
            'label' => [
                'index' => 'Danh sách',
                'create' => 'Thêm mới',
                'update' => 'Cập nhật',
                'view' => 'Thông tin chi tiết',
                'statistic' => 'Thống kê',
            ],
            'url' => [
                'index' => 'index',
                'create' => 'create',
                'update' => 'update',
                'view' => 'view',
                'statistic' => 'statistic',
            ],
        ];
    }
    /**
     * Lists all CongTrinh models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $model['loaidat'] = DmLoaidat::find()->orderBy('id')->all();
        $model['tinhtrang_congtrinh'] = DmTinhtrangCongTrinh::find()->orderBy('id')->all();
        $model['loaicongtrinh'] = DmLoaicongTrinh::find()->orderBy('id')->all();
        $model['coquan_thamdinh'] = CoquanThamdinh::find()->orderBy('id')->all();
        $model['donvi_pheduyet'] = DonviPheduyet::find()->orderBy('id')->all();

        $searchModel = new CongTrinhSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['CongTrinhSearch']['status'] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single CongTrinh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model['congtrinh'] = $this->findModel($id);
        $model['chudautu'] = Chudautu::find()->where(['id' => $model['congtrinh']->chudautu_id])->one();
        $model['congtrinh_thaydoi'] = CongtrinhThaydoi::find()->where(['congtrinh_id' => $id])->orderBy('id')->all();
        $congtrinhTimeline = CongtrinhTimeline::find()->where(['congtrinh_id' => $id])->andWhere(['status' => 1])->orderBy('id')->all();

        // echo '<pre>';
        // var_dump($model['congtrinh_timeline']);
        // echo '</pre>';
        // die();

        return $this->render('view', [
            'model' => $model,
            'congtrinhTimeline' => $congtrinhTimeline,
        ]);
    }

    public function actionViewHistory($id){
        $model['congtrinh_thaydoi'] = CongtrinhThaydoi::find()->where(['id' => $id])->one();
        $model['congtrinh'] = CongTrinh::find()->where(['id' => $model['congtrinh_thaydoi']->congtrinh_id])->one();

        return $this->render('view-history', [
            'model' => $model,
        ]);
    }

    public function actionUpdateHistory($id){
        $request = Yii::$app->request;
        $model['congtrinh_thaydoi'] = CongtrinhThaydoi::find()->where(['id' => $id])->one();

        $model['congtrinh'] = CongTrinh::find()->where(['id' => $model['congtrinh_thaydoi']->congtrinh_id])->one();

        $model['loaidat'] = DmLoaidat::find()->orderBy('id')->all();
        $model['tinhtrang_congtrinh'] = DmTinhtrangCongTrinh::find()->orderBy('id')->all();
        $model['loaicongtrinh'] = DmLoaicongTrinh::find()->orderBy('id')->all();
        $model['coquan_thamdinh'] = CoquanThamdinh::find()->orderBy('id')->all();
        $model['donvi_pheduyet'] = DonviPheduyet::find()->orderBy('id')->all();
        $model['huyen'] = RanhHuyen::find()->orderBy('gid')->all();
        $model['xa'] = RanhXa::find()->orderBy('gid')->all();
        
        if($model['congtrinh_thaydoi']->load($request->post())){
            if ($model['congtrinh_thaydoi']->ngay_cap != null) {
                $model['congtrinh_thaydoi']->ngay_cap = date('Y-m-d', strtotime($model['congtrinh_thaydoi']->ngay_cap));
            }
            $model['congtrinh_thaydoi']->save();

            return $this->redirect(['view', 'id' => $model['congtrinh']->id]);

        }
        else{
            return $this->render('update-history', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new CongTrinh model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model['congtrinh'] = new CongTrinh();
        $model['chudautu'] = new ChuDauTu();
        $model['loaidat'] = DmLoaidat::find()->orderBy('id')->all();
        $model['tinhtrang_congtrinh'] = DmTinhtrangCongTrinh::find()->orderBy('id')->all();
        $model['loaicongtrinh'] = DmLoaicongTrinh::find()->orderBy('id')->all();
        $model['coquan_thamdinh'] = CoquanThamdinh::find()->orderBy('id')->all();
        $model['donvi_pheduyet'] = DonviPheduyet::find()->orderBy('id')->all();
        $model['huyen'] = RanhHuyen::find()->orderBy('gid')->all();
        $model['xa'] = RanhXa::find()->orderBy('gid')->all();

        if($model['congtrinh']->load($request->post()) && $model['chudautu']->load($request->post())){
            $model['chudautu']->save();

            $model['congtrinh']->chudautu_id = $model['chudautu']->id;
            $model['congtrinh']->status = 1;
            if ($model['congtrinh']->ngay_cap != null) {
                $model['congtrinh']->ngay_cap = date('Y-m-d', strtotime($model['congtrinh']->ngay_cap));
            }
            $model['congtrinh']->created_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));

            $model['congtrinh']->save();


            Yii::$app->session->setFlash('kv-detail-success', 'Thêm mới thông tin công trình thành công !');
            return $this->redirect(['view', 'id' => $model['congtrinh']->id]);
        }
        else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        

    }

    /**
     * Updates an existing CongTrinh model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model['congtrinh'] = $this->findModel($id);
        $model['chudautu'] = Chudautu::find()->where(['id' => $model['congtrinh']->chudautu_id])->one();
        $model['loaidat'] = DmLoaidat::find()->orderBy('id')->all();
        $model['tinhtrang_congtrinh'] = DmTinhtrangCongTrinh::find()->orderBy('id')->all();
        $model['loaicongtrinh'] = DmLoaicongTrinh::find()->orderBy('id')->all();
        $model['coquan_thamdinh'] = CoquanThamdinh::find()->orderBy('id')->all();
        $model['donvi_pheduyet'] = DonviPheduyet::find()->orderBy('id')->all();
        $model['huyen'] = RanhHuyen::find()->orderBy('gid')->all();
        $model['xa'] = RanhXa::find()->orderBy('gid')->all();

        $model['congtrinh_thaydoi'] = new CongtrinhThaydoi();



        if($model['congtrinh']->load($request->post()) && $model['chudautu']->load($request->post())){
            $model['chudautu']->save();

            if ($model['congtrinh']->ngay_cap != null) {
                $model['congtrinh']->ngay_cap = date('Y-m-d', strtotime($model['congtrinh']->ngay_cap));
            }

            $model['congtrinh']->updated_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));

            $model['congtrinh']->save();

            $arr = array_keys($model['congtrinh']->attributes); //mảng lấy các trường của công trình
            foreach($arr as $key => $value) {
                if($value == 'id'){
                    $idKey = $key;
                }
                break;
            }

            unset($arr[$idKey]); //xóa trường id 
            
            foreach($arr as $value){
                $model['congtrinh_thaydoi'][$value] = $model['congtrinh'][$value];
            }

            $model['congtrinh_thaydoi']->congtrinh_id = $id;

            $model['congtrinh_thaydoi']->updated_at = null;
            $model['congtrinh_thaydoi']->save();

            Yii::$app->session->setFlash('kv-detail-success', 'Cập nhập thông tin công trình thành công !');
            return $this->redirect(['view', 'id' => $model['congtrinh']->id]);
        }
        else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Delete an existing CongTrinh model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        $model->status = 0;
        $model->save();

        Yii::$app->getSession()->setFlash('success', 'Xóa thành công thông tin công trình ' . $model['congtrinh']->ten);
        return $this->redirect(['index']);
    }

    public function actionTimeline($id){
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('quanly/cong-trinh'));
        }
        $model['timeline'] = CongtrinhTimeline::find()->where(['congtrinh_id' => $id])->andWhere(['status' => 1])->orderBy('id')->all();
        $idCongtrinh = $id;

        return $this->renderPartial('inc_update/timeline', [
            'model' => $model,
            'idCongtrinh' => $idCongtrinh,
        ]);
    }

    public function actionCreatetimeline($id){
        $request = Yii::$app->request;
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('quanly/cong-trinh'));
        }

        $model['timeline'] =  new CongtrinhTimeline();
        $model['loaigiayphep'] =  DmLoaigiayphep::find()->orderBy('id')->all();
        $model['donvicapphep'] =  Donvicapphep::find()->orderBy('id')->all();
        $model['tinhtranggiayphep'] = DmTinhTrangGiayphep::find()->orderBy('id')->all();
        if($model['timeline']->load(Yii::$app->request->post())){
            $model['timeline']->congtrinh_id = $id;

            if ($model['timeline']->ngay_cap != null) {
                $model['timeline']->ngay_cap = date('Y-m-d', strtotime($model['timeline']->ngay_cap));
            }

            if ($model['timeline']->thoi_han != null) {
                $model['timeline']->thoi_han = date('Y-m-d', strtotime($model['timeline']->thoi_han));
            }

            $model['timeline']->status = 1;
            $model['timeline']->created_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));
            $model['timeline']->save();


            UtilityService::alert('timeline_create_success');
            return true;
        }

        if (!$request->isAjax && $request->isGet) {
            return $this->render('inc_update/createtimeline', [
                'model' => $model,
            ]);
        }
        return $this->renderAjax('inc_update/createtimeline', [
            'model' => $model,
        ]);
    }

    public function actionUpdatetimeline($id){
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('quanly/cong-trinh'));
        }
        $model['timeline'] = CongtrinhTimeline::findOne($id);
        $model['loaigiayphep'] =  DmLoaigiayphep::find()->orderBy('id')->all();
        $model['donvicapphep'] =  Donvicapphep::find()->orderBy('id')->all();
        $model['tinhtranggiayphep'] = DmTinhTrangGiayphep::find()->orderBy('id')->all();

        if($model['timeline']->load(Yii::$app->request->post())){
            if ($model['timeline']->ngay_cap != null) {
                $model['timeline']->ngay_cap = date('Y-m-d', strtotime($model['timeline']->ngay_cap));
            }

            if ($model['timeline']->thoi_han != null) {
                $model['timeline']->thoi_han = date('Y-m-d', strtotime($model['timeline']->thoi_han));
            }

            $model['timeline']->updated_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));
            $model['timeline']->save();

            UtilityService::alert('timeline_updated_success');
            return true;
        }

        return $this->renderAjax('inc_update/updatetimeline', [
            'model' => $model,
        ]);
    }

    public function actionDeletetimeline($id){
        if (!UtilityService::paramValidate($id)) {
            return $this->redirect(Yii::$app->urlManager->createUrl('quanly/cong-trinh'));
        }

        $model['timeline'] =  CongtrinhTimeline::findOne($id);
        if ($model['timeline']->load(Yii::$app->request->post())) {
            $model['timeline']->status = 0;
            $model['timeline']->save();
            UtilityService::alert('timeline_delete_success');
            return true;
        }

        return $this->renderAjax('inc_update/deletetimeline', [
            'model' => $model,
        ]);
    }

    
    /**
     * Finds the CongTrinh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CongTrinh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CongTrinh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
