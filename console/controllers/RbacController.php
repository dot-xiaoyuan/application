<?php
namespace console\controllers;

use Yii;
use yii\base\Exception;
use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * @throws Exception
     * @throws \Exception
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $admin = $auth->createRole('root');
        $admin->description = 'Super Administrator';
        $auth->add($admin);

        $roleManager = $auth->createPermission('/rbac/role/*');
        $roleManager->description = 'Role Manager';
        $auth->add($roleManager);

        $perManager = $auth->createPermission('/rbac/permissions/*');
        $perManager->description = 'Permissions Manager';
        $auth->add($perManager);

        $auth->addChild($admin, $roleManager);
        $auth->addChild($admin, $perManager);
        $auth->assign($admin, 1);
    }
}