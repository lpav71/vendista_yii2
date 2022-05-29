<?php
namespace app\controllers\api;

use Yii;
use \yii\rest\ActiveController;
use yii\web\Controller;

class TerminalController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id == 'send') {
            $this->enableCsrfValidation = false;
        }
        if ($action->id == 'send-to0-terminal') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }


    public function actionSendToTerminal()
    {
        $request = Yii::$app->request;
        $command_id = $request->post('command_id');
        $parameter_1 = $request->post('parameter_1');
        $parameter_2 = $request->post('parameter_2');
        $parameter_3 = $request->post('parameter_3');
        $parameter_4 = $request->post('parameter_4');
        $terminal = $request->post('terminal');
        $token = $request->post('token');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://178.57.218.210:198/terminals/' . $terminal . '/commands?token=' . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"command_id": ' . $command_id . ',"parameter1": ' . $parameter_1 . ',"parameter2": ' . $parameter_2 . ',"parameter3": ' . $parameter_3 . ',"parameter4": ' . $parameter_4 . '}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}