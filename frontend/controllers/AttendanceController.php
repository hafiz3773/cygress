<?php

namespace frontend\controllers;

use common\models\Attendance;
use common\models\AttendanceEventSearch;
use common\models\AttendanceSearch;
use common\models\Training;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttendanceController implements the CRUD actions for Attendance model.
 */
class AttendanceController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Attendance models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AttendanceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList($training_id)
    {
        $searchModel = new AttendanceEventSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attendance model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Attendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Attendance();
        $event = Training::find()->where('`date` >= UNIX_TIMESTAMP(CURDATE())')->andWhere('`date` < UNIX_TIMESTAMP(CURDATE() + INTERVAL 1 DAY)')->one();
//        echo $event->id;
//        exit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if($this->isStudentExist($model->user_id)) {
                    if(!(Attendance::isAlreadyAttended($model->training_id,$model->user_id))){
                        if($model->save()){
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    }else {
                        \Yii::$app->session->setFlash('error', 'You\'re already clock in!');
                    }
                }else {
                    \Yii::$app->session->setFlash('warning', 'You are not our Student! Kindly consult Miss Aqylah for more info');
                }


            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'event' => $event,
        ]);
    }

    public function actionCheckin()
    {
        $model = new Attendance();
        $event = Training::find()->where('`date` >= UNIX_TIMESTAMP(CURDATE())')->andWhere('`date` < UNIX_TIMESTAMP(CURDATE() + INTERVAL 1 DAY)')->one();
//        echo $event->id;
//        exit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if($this->isStudentExist($model->user_id)) {
                    if(!(Attendance::isAlreadyAttended($model->training_id,$model->user_id))){
                        if($model->save()){
//                            return $this->redirect(['view', 'id' => $model->id]);
                            \Yii::$app->session->setFlash('success', 'You\'re successfully clocked in. Enjoy your training!! ');

                        }
                    }else {
                        \Yii::$app->session->setFlash('error', 'You\'re already clock in!');
                    }
                }else {
                    \Yii::$app->session->setFlash('warning', 'You are not our Student! Kindly consult Miss Aqylah for more info');
                }


            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'event' => $event,
        ]);
    }

    /**
     * Updates an existing Attendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Attendance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    private function getUserIdList()
    {
        $model = User::find()->select('user_id')->where(['user_status' => User::USER_STUDENT])->all();
        return ArrayHelper::map($model, 'user_id', 'user_id');
    }

    private function isStudentExist($user_id)
    {
        return User::find()->where(['user_id' => $user_id,'user_status' => User::USER_STUDENT,'status' => User::STATUS_ACTIVE])->exists();
    }

    /**
     * Finds the Attendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Attendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attendance::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
