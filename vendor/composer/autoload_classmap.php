<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AdminController' => $baseDir . '/app/modules/admin/controllers/AdminController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'CreateTopicsAnswersTable' => $baseDir . '/app/database/migrations/2016_01_31_021439_create_topics_answers_table.php',
    'CreateTopicsTable' => $baseDir . '/app/database/migrations/2016_01_31_020943_create_topics_table.php',
    'CreateUsersTable' => $baseDir . '/app/database/migrations/2016_01_29_020238_create_users_table.php',
    'DashboardController' => $baseDir . '/app/modules/dashboard/controllers/DashboardController.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'ForumController' => $baseDir . '/app/modules/forum/controllers/ForumController.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'LoginController' => $baseDir . '/app/modules/login/controllers/LoginController.php',
    'Normalizer' => $vendorDir . '/patchwork/utf8/src/Normalizer.php',
    'RestApiController' => $baseDir . '/app/modules/restapi/controllers/RestApiController.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'Topic' => $baseDir . '/app/modules/forum/models/Topic.php',
    'TopicAnswer' => $baseDir . '/app/modules/forum/models/TopicAnswer.php',
    'TopicAnswerRestApiController' => $baseDir . '/app/modules/forum/controllers/TopicAnswerRestApiController.php',
    'TopicAnswerTableSeeder' => $baseDir . '/app/database/seeds/TopicAnswerTableSeeder.php',
    'TopicController' => $baseDir . '/app/modules/forum/controllers/TopicController.php',
    'TopicRestApiController' => $baseDir . '/app/modules/forum/controllers/TopicRestApiController.php',
    'TopicTableSeeder' => $baseDir . '/app/database/seeds/TopicTableSeeder.php',
    'User' => $baseDir . '/app/models/User.php',
    'UserTableSeeder' => $baseDir . '/app/database/seeds/UserTableSeeder.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
);
