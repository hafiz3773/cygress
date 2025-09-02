<?php

namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
                'layout' => 'error',
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($user = null)
    {
//        Yii::$app->language = 'ms-MY';
//        Yii::$app->language = 'en-US';
//        echo '<pre>';
//        print_r($user->nick_name);
//        exit();
        return $this->render('index', ['user' => $user]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {

            if($model->login()){
                Yii::$app->session->setFlash('success', 'Welcome back, <strong>' . Yii::$app->user->identity->full_name.'</strong>');
                return $this->goHome();
            }
            else {
                Yii::$app->session->setFlash('error', 'Failed to login. Invalid email or password.');
            }
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionUser()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('user', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUserDetails($user_id)
    {
        return $this->render('userDetails',[
            'model' => User::findOne($user_id),
        ]);
    }

    public function actionUserView($id)
    {
        return $this->render('userView', [
            'model' => $this->findModelUser($id),
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if($model->signup())
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            else
                Yii::$app->session->setFlash('danger', $model->errors);

            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        return $this->render('profile',[
            'model' => User::findOne(Yii::$app->user->identity->id),
        ]);
    }

    public function actionUpdateProfile()
    {
        $model = User::findOne(Yii::$app->user->identity->id);

        if (!$model) {
            throw new NotFoundHttpException("User not found.");
        }

        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();
            $post = $post['User'];
//            echo '<pre>';
//            print_r($post);
//            exit();

            $model->full_name = $post['full_name'];
            $model->nick_name = $post['nick_name'];
            $model->ic = $post['ic'];
            $model->phone = $post['phone'];
            $model->phone1 = $post['phone1'];
            $model->address = $post['address'];
            $model->illness = $post['illness'];
            $model->econtact1_fullname = $post['econtact1_fullname'];
            $model->econtact1_phone = $post['econtact1_phone'];
            $model->econtact1_relation = $post['econtact1_relation'];
            $model->econtact2_fullname = $post['econtact2_fullname'];
            $model->econtact2_phone = $post['econtact2_phone'];
            $model->econtact2_relation = $post['econtact2_relation'];
            $model->experience = $post['experience'];
            $model->position =  implode(',',$post['position']);

            if($model->save()){
                Yii::$app->session->setFlash('success', 'User updated successfully.');
                return $this->redirect('profile');
            }else {
                exit();
            }

        }

        return $this->render('updateProfile', [
            'model' => $model,
        ]);
    }


    public function actionRegister()
    {
        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = 'CYxxxxx';        // set initial value
            $model->password = Yii::$app->params['defaultPassword'];
//            exit();

            if($model->signup())
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            else {
                // Save failed, get error messages
                $errorMessages = [];
                foreach ($model->errors as $attribute => $errors) {
                    foreach ($errors as $error) {
                        $errorMessages[] = Html::encode($model->getAttributeLabel($attribute)) . ': ' . Html::encode($error);
                    }
                }
//                echo '<pre>';
//                print_r($model->errors);
//                Yii::error($model->getErrors(), __METHOD__); // log errors
//                var_dump($model->getErrors()); // debug
//                exit();
                Yii::$app->session->setFlash('error', implode('<br>', $errorMessages));
//                return $this->refresh(); // Or redirect back to the form
            }

            return $this->goHome();


        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
//            return $this->goHome();
            return $this->actionIndex($user);
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    protected function findModelUser($id)
    {
        if (($model = User::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
