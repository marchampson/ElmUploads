<?php

namespace ElmUploads;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use ElmContent\Model\UsersTable;
use ElmContent\Model\User;
use ElmUploads\Model\Upload;
use ElmUploads\Model\UploadTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Session\Container;
use ElmContent\Utilities\Image;
use ElmContent\Utilities\PageUtils;

use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Authentication\AuthenticationService;

class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
            // the array key here is the name you will call the view helper by in your view scripts
            ),
            'invokables' => array(
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                // SERVICES
                'AuthService' => function($sm) {
                                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                                $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 'user','email','password', 'MD5(?)');

                                $authService = new AuthenticationService();
                                $authService->setAdapter($dbTableAuthAdapter);
                                return $authService;
                },
                // DB
                'UploadTable' => function($sm) {
                    $tableGateway = $sm->get('UploadTableGateway');
                    $uploadSharingTableGateway = $sm->get('UploadSharingTableGateway');
                    $table = new UploadTable($tableGateway, $uploadSharingTableGateway);
                    return $table;
                },
                'UploadTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Upload());
                    return new TableGateway('uploads', $dbAdapter, null, $resultSetPrototype);
                },
                'UploadSharingTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    return new TableGateway('uploads_sharing', $dbAdapter);
                },
                'UploadForm' => function ($sm) {
                    $form = new \ElmUploads\Form\UploadForm();
                    return $form;
                },
                'UploadEditForm' => function ($sm) {
                    $form = new \ElmUploads\Form\UploadEditForm();
                    return $form;
                },
                'UploadShareForm' => function ($sm) {
                    $form = new \ElmUploads\Form\UploadShareForm();
                    return $form;
                },
            ),
            'invokables' => array(
            //'ElmContent\Form\ProductForm' => 'ElmContent\Form\ProductForm'
            )
        );
    }

}