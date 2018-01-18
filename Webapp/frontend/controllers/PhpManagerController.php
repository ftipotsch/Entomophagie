<?php
use yii\db\Migration;

class PhpManagerController extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'View a Post';
        $auth->add($createPost);

        // add "viewPost" permission
        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description = 'View a Post';
        $auth->add($viewPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "user" role and give this role the "viewPost" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $viewPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "user" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost, $createPost);
        $auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}