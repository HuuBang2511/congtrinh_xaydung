<?php

namespace app\modules\quanly\controllers;

use Yii;
use app\modules\quanly\models\CongtrinhTimeline;
use app\modules\quanly\models\CongtrinhTimelineSearch;
use app\modules\services\UtilityService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\base\BaseController;
use app\modules\danhmuc\models\DmTinhtrangGiayphep;
use app\modules\danhmuc\models\DmLoaigiayphep;
use app\modules\quanly\models\DonviCapphep;

/**
 * CongtrinhTimelineController implements the CRUD actions for CongtrinhTimeline model.
 */
class CongtrinhTimelineController extends BaseController
{

    public $title = "CongtrinhTimeline";

    /**
     * Lists all CongtrinhTimeline models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CongtrinhTimelineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single CongtrinhTimeline model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new CongtrinhTimeline model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($congtrinh_id)
    {
        $request = Yii::$app->request;
        $congtrinhTimeline = new CongtrinhTimeline();

        $model['loaigiayphep'] =  DmLoaigiayphep::find()->orderBy('id')->andwhere(['status' => 1])->all();
        $model['donvicapphep'] =  Donvicapphep::find()->orderBy('id')->andwhere(['status' => 1])->all();
        $model['tinhtranggiayphep'] = DmTinhTrangGiayphep::find()->andwhere(['status' => 1])->orderBy('id')->all();

        if($congtrinhTimeline->load($request->post())){
            $congtrinhTimeline->congtrinh_id = $congtrinh_id;

            $congtrinhTimeline->save();

            UtilityService::alert('created_success');
            return $this->redirect(['cong-trinh/view', 'id' => $id]);
        }

        return $this->render('create', [
            'congtrinhTimeline' => $congtrinhTimeline,
            'model' => $model,       
            'congtrinh_id' => $congtrinh_id,
        ]);


    }

    /**
     * Updates an existing CongtrinhTimeline model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $congtrinhTimeline = $this->findModel($id);

        $model['loaigiayphep'] =  DmLoaigiayphep::find()->orderBy('id')->andwhere(['status' => 1])->all();
        $model['donvicapphep'] =  Donvicapphep::find()->orderBy('id')->andwhere(['status' => 1])->all();
        $model['tinhtranggiayphep'] = DmTinhTrangGiayphep::find()->andwhere(['status' => 1])->orderBy('id')->all();

        if($congtrinhTimeline->load($request->post())){
            $congtrinhTimeline->save();

            UtilityService::alert('updated_success');
            return $this->redirect(['cong-trinh/view', 'id' => $congtrinhTimeline->congtrinh_id]);
        }

        return $this->render('update', [
            'congtrinhTimeline' => $congtrinhTimeline,
            'model' => $model,   
        ]);
    }


    /**
     * Delete an existing CongtrinhTimeline model.
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

        return $this->redirect(['cong-trinh/view', 'id' => $model->congtrinh_id]);
    }

    
    /**
     * Finds the CongtrinhTimeline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CongtrinhTimeline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CongtrinhTimeline::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
