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

        // Dashboard
        $siteManager = $auth->createPermission('/');
        $siteManager->description = 'Dashboard';
        $auth->add($siteManager);
        $auth->addChild($admin, $siteManager);

        // rbac
        $roleManager = $auth->createPermission('/rbac/role/*');
        $roleManager->description = 'Role Manager';
        $auth->add($roleManager);
        $auth->addChild($admin, $roleManager);

        $perManager = $auth->createPermission('/rbac/permissions/*');
        $perManager->description = 'Permissions Manager';
        $auth->add($perManager);
        $auth->addChild($admin, $perManager);

        // user
        $perManager = $auth->createPermission('/user/default/*');
        $perManager->description = 'User Manager';
        $auth->add($perManager);
        $auth->addChild($admin, $perManager);

        // logs
        $perManager = $auth->createPermission('/logs/default/*');
        $perManager->description = 'Logs Manager';
        $auth->add($perManager);
        $auth->addChild($admin, $perManager);

        // category
        $perManager = $auth->createPermission('/category/default/*');
        $perManager->description = 'Category Manager';
        $auth->add($perManager);
        $auth->addChild($admin, $perManager);

        $auth->assign($admin, 1);
    }
}