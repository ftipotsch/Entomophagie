<?php

namespace frontend\controllers;

use frontend\models\Data;
use Yii;
use common\models\Seriennummer;
use frontend\models\SeriennummerSearch;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;



/**
 * SeriennummerController implements the CRUD actions for Seriennummer model.
 */
class SeriennummerController extends Controller
{
    /**
     * @inheritdoc
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];

    }

    /**
     * Lists all Seriennummer models.
     * @return mixed
     */

    /**
     * Displays a single Seriennummer model.
     * @param integer $id
     * @return mixed
     */
    public function actionIndex()
    {
        $User = User::find()->where(['id' => ''.Yii::$app->user->identity->getId()])->one();

        $id = $User->Seriennummer_id;
        $seriennummerData = Data::find()->where(['seriennummer_idSeriennummer' => ''.$id])->all();
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT * From data WHERE seriennummer_idSeriennummer ='.$id
                    ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'data' => $dataProvider,

    ]);
    }

    /**
     * Creates a new Seriennummer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    /**
     * Finds the Seriennummer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seriennummer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seriennummer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
