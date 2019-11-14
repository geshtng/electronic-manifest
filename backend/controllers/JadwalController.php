<?php

namespace backend\controllers;

use Yii;
use backend\models\Jadwal;
use backend\models\Penumpang;
use backend\models\search\JadwalSearch;
use backend\models\search\PenumpangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JadwalController implements the CRUD actions for Jadwal model.
 */
class JadwalController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jadwal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModelPenumpang = new PenumpangSearch();
        $dataProviderPenumpang = $searchModelPenumpang->searchByPosisiPenumpang(Yii::$app->request->queryParams, $id);
        $dataProviderKru = $searchModelPenumpang->searchByPosisiKru(Yii::$app->request->queryParams, $id);

        $modelPenumpang = new Penumpang();
        
        if ($modelPenumpang->load(Yii::$app->request->post())) {
            $modelPenumpang->jadwal_id = $id;
            $modelPenumpang->save();
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModelPenumpang' => $searchModelPenumpang,
            'dataProviderPenumpang' => $dataProviderPenumpang,
            'dataProviderKru' => $dataProviderKru,
            
        ]);
    }

    /**
     * Creates a new Jadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jadwal();
        
        $statusSelesai = "1";
        $statusReady = "0";

        if ($model->load(Yii::$app->request->post())) {
            $model->status = $statusReady;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jadwal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
