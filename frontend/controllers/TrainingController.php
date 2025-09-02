<?php

namespace frontend\controllers;

use common\models\Attendance;
use common\models\AttendanceEventSearch;
use common\models\Training;
use common\models\TrainingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * TrainingController implements the CRUD actions for Training model.
 */
class TrainingController extends Controller
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
     * Lists all Training models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrainingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Training model.
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

    public function actionList($training_id)
    {
        $searchModel = new AttendanceEventSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);



        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($training_id),
        ]);
    }

    public function actionLxx($training_id)
    {
        $searchModel = new AttendanceEventSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('lxx', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionToggleStatus()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id = \Yii::$app->request->post('id');
        $newStatus = \Yii::$app->request->post('status');

            $newStatus = (int) $newStatus;

        if ($id !== null && $newStatus !== null) {
            $model = Attendance::findOne($id); // Replace YourModel with your actual model
            if ($model) {
                $model->fee = $newStatus;
                if ($model->save(false)) { // Save without running full validation
                    return ['success' => true];
                } else {
                    return ['success' => false, 'message' => 'Failed to update status.'];
                }
            } else {
                return ['success' => false, 'message' => 'Record not found.'];
            }
        } else {
            return ['success' => false, 'message' => 'Invalid request data.'];
        }
    }


    /**
     * Creates a new Training model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
//
//        $uploadPath = \Yii::getAlias('@webroot/uploads/');
//        if (!is_dir($uploadPath)) {
//            if (!mkdir($uploadPath, 0777, true) && !is_dir($uploadPath)) {
//                throw new \RuntimeException(sprintf('Directory "%s" was not created', $uploadPath));
//            }
//        }
//        exit();
        $model = new Training();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if($model->date !== null)
                {
                    $is_exist = Training::find()->where(['date' => $model->date])->exists();

                    if(!$is_exist){

                        $file = UploadedFile::getInstance($model,'file');

                        if($file)
                        {
                            $uploadPath = \Yii::getAlias('@webroot/uploads/');
                            if (!is_dir($uploadPath)) {
                                if (!mkdir($uploadPath, 0777, true) && !is_dir($uploadPath)) {
                                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $uploadPath));
                                }
                            }

                            $fileName = uniqid('', true) . '.' . $file->extension;

                            $model->file = 'uploads/' . $fileName;
                        }

                        if($model->save())
                        {
                            if ($file !== null) {
                                $file->saveAs(\Yii::getAlias('@webroot') . "/" . $model->file);
                            }
                            \Yii::$app->session->setFlash('success', 'New event has been created.');
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    }else {
                        \Yii::$app->session->setFlash('error', 'The date event already exist!');
                    }
                }else {
                    \Yii::$app->session->setFlash('error', 'The date event is compulsory!');
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Training model.
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
     * Deletes an existing Training model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $data = $this->findModel($id);

        if($data->file && file_exists(\Yii::getAlias('@webroot') .'/'. $data->file))
            unlink(\Yii::getAlias('@webroot') .'/'. $data->file);
        $data->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Training model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Training the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Training::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
