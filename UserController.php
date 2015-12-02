<?php
//yii2.0
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Users;
use Yii;

class UserController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionVerifyLogin()
    {
        $request = Yii::$app->request;
        $name = $request->post('name');   
        $password = $request->post('password');

        $count = Users::find()
        ->where(['name' => $name, 'password' => $password])
        ->count();

        $session = Yii::$app->session;
        $session->open();

        if ($count == 1) {
            $result = true;
            $session->set('username', $name);
        } else {
            $result = false;
        }

        // $username = $session->get('username');

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'result' =>  $result
        ];
    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->remove('username');
        $session->destroy();
    }

    public function actionQueryList()
    {
        $users = Users::find()
        ->orderBy('_id')
        ->asArray()
        ->all();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'users' => $users
        ];
    }

    public function actionQueryDetail()
    {
        $request = Yii::$app->request;
        $id = $request->post('id');   

        $user = Users::find()
        ->where(['_id' => $id])
        ->asArray()
        ->one();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'user' => $user
        ];
    }

    public function actionDeleteOne()
    {
        $request = Yii::$app->request;
        $id = $request->post('id');   

        $user = Users::findOne($id);
        $user->delete();
    }

    public function actionSaveOne()
    {
        $request = Yii::$app->request;
        $id = $request->post('id');   
        $name = $request->post('name');
        $password = $request->post('password');
        $description = $request->post('description');

        $user = Users::findOne($id);
        $user->name = $name;
        $user->password = $password;
        $user->description = $description;
        $user->save();
    }

    public function actionCreateOne()
    {
        $request = Yii::$app->request;
        $name = $request->post('name');
        $password = $request->post('password');
        $description = $request->post('description');

        $user = new Users();
        $user->name = $name;
        $user->password = $password;
        $user->description = $description;
        $user->save();
    }

    public function actionSearchCondition()
    {
        $request = Yii::$app->request;
        $keyword = $request->post('keyword');

        $users = Users::find()
        ->where(['like', 'name', $keyword] )
        ->orderBy('_id')
        ->asArray()
        ->all();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        return [
            'users' => $users
        ];
    }
}

?>