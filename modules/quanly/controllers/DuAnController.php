<?php

namespace app\modules\quanly\controllers;

use Yii;
use app\modules\quanly\models\DuAn;
use app\modules\quanly\models\DuAnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\quanly\base\QuanlyBaseController;
use app\modules\danhmuc\models\DmTinhtrangDuan;
use app\modules\danhmuc\models\DmHatangXahoi;
use app\modules\quanly\models\DuanThaydoi;
use app\modules\quanly\models\RanhXa;
use app\modules\quanly\models\RanhHuyen;
use app\modules\base\BaseController;
use app\modules\quanly\models\ChuDauTu;
use app\modules\services\DuanService;

/**
 * DuAnController implements the CRUD actions for DuAn model.
 */
class DuAnController extends BaseController
{

    public $const;

    public function init(){
        parent::init();
            $this->const = [
            'title' => 'Dự án',
            'label' => [
                'index' => 'Danh sách',
                'create' => 'Thêm mới',
                'update' => 'Cập nhật',
                'view' => 'Thông tin chi tiết',
                'statistic' => 'Thống kê',
            ],
            'url' => [
                'index' => 'index',
                'create' => 'Thêm mới',
                'update' => 'Cập nhật',
                'view' => 'Thông tin chi tiết',
                'statistic' => 'Thống kê',
            ],
        ];
    }

    /**
     * Lists all DuAn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model['tinhtrang_duan'] =  DmTinhtrangDuan::find()->orderBy('id')->all();
        $model['hatang_xahoi'] = DmHatangXahoi::find()->orderBy('id')->all();
        $searchModel = new DuAnSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['DuAnSearch']['status'] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }


    /**
     * Displays a single DuAn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       $model =  $this->findModel($id);
       $chudautu = $model->chudautu;
       $duanThaydoi = DuanThaydoi::find()->where(['duan_id' => $id])->andWhere(['status' => 1])->all();

       return $this->render('view', [
        'model' => $model,
        'chudautu' => $chudautu,
        'duanThaydoi' => $duanThaydoi,
        ]);
    }

    /**
     * Creates a new DuAn model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        
        $chudautu = new ChuDauTu();
        $duan = new DuAn();

        if(($chudautu->load($request->post())) && ($duan->load($request->post()))){
            $chudautu->save();

            $duan->chudautu_id = $chudautu->id;

            $duan->save();

            echo '<pre>';
            var_dump($duan);
            echo '</pre>';
            die();

            return $this->redirect(['view', 'id' => $duan->id]);
        }

        return $this->render('create', [
            'chudautu' => $chudautu,
            'duan' => $duan,
            'categories' => DuanService::getCategories(),
        ]);

    }

    /**
     * Updates an existing DuAn model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $duan = $this->findModel($id);
        $chudautu = $duan->chudautu;
        $duanThaydoi = new DuanThaydoi();

        // echo '<pre>';
        // var_dump($duan);
        // echo '</pre>';
        // die();

        if(($duan->load($request->post())) && $chudautu->load($request->post())){
            $chudautu->save();
            $duan->save();

            $arr = array_keys($duan->attributes); //mảng lấy các trường của dự án.
            foreach($arr as $key => $value) {
                if($value == 'id'){
                    $idKey = $key;
                }
                break;
            }
            unset($arr[$idKey]); //xóa trường id
            foreach($arr as $value){
                $duanThaydoi[$value] = $duan[$value];
            }

            $duanThaydoi->duan_id = $id;  
            $duanThaydoi->updated_at = null;     

            $duanThaydoi->save();

            return $this->redirect(['view', 'id' => $duan->id]);
        }

        return $this->render('update', [
            'chudautu' => $chudautu,
            'duan' => $duan,
            'categories' => DuanService::getCategories(),
        ]);
    }

    /**
     * Delete an existing DuAn model.
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

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the DuAn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DuAn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DuAn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
