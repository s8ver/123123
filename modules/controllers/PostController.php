<?php

namespace app\modules\controllers;

use Yii;
use app\modules\models\Post;
use app\modules\models\PostSearch;

use app\modules\models\Prepod;
use app\modules\models\PrepodSearch;

use app\modules\models\Download;
use app\modules\models\FileUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
     public function actionViewx($id)
    {
        return $this->render('viewx', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prepod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatex()
    {
        $model = new Prepod();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewx', 'id' => $model->id_user]);
        }

        return $this->render('createx', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prepod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatex($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewx', 'id' => $model->id_user]);
        }

        return $this->render('updatex', [
            'model' => $model,
        ]);
    }
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionIndexx()
    {
        $searchModel = new PrepodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexx', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
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
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionSetFile($id)
      {
        
        $model = new FileUpload;
        


        if(Yii::$app->request->isPost)
        {
            $Post = $this->findModel($id);


            $file = UploadedFile::getInstance($model,'file');
            
           // var_dump();die;


           if( $Post->saveFile($model->uploadFile($file,$Post->file)))
           {
            return $this->redirect(['index', 'id'=>$Post->id]);
           }
      }
      return $this->render('file', ['model'=>$model]);
        
        
  }


  public function actionDownload()
  {
    
        $model = new Download();
    
  Download::fileDownload(Download::getFilename());
        
    
}
}
