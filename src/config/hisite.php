<?php
/**
 * Theme Manager for Yii2
 *
 * @link      https://github.com/hiqdev/yii2-thememanager
 * @package   yii2-thememanager
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

return [
    'bootstrap' => [
        'themeManager' => 'themeManager',
    ],
    'components' => [
        'themeSettingsStorage' => [
            'class' => \hiqdev\thememanager\storage\SessionSettingsStorage::class,
        ],
        'themeManager' => [
            'class' => \hiqdev\thememanager\ThemeManager::class,
        ],
        'i18n' => [
            'translations' => [
                'hiqdev:thememanager' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@hiqdev/thememanager/messages',
                ],
            ],
        ],
    ],
    'modules' => array_filter([
        'thememanager' => [
            'class' => \hiqdev\thememanager\Module::class,
            'defaultRoute' => 'settings',
        ],
        'debug' => defined('YII_DEBUG') && YII_DEBUG ? [
            'panels' => [
                'themes' => [
                    'class' => \hiqdev\thememanager\debug\Panel::class,
                ],
            ],
        ] : null,
    ]),
    'container' => [
        'definitions' => [
            'Menu' => [
                'class' => \yii\widgets\Menu::class,
            ],
            'UserMenu' => [
                'class' => \hiqdev\thememanager\widgets\UserMenu::class,
            ],
            'Breadcrumbs' => [
                'class' => \yii\widgets\Breadcrumbs::class,
            ],
            'Alert' => [
                'class' => \yii\bootstrap\Alert::class,
            ],
            'PoweredBy' => [
                'class'   => \hiqdev\thememanager\widgets\PoweredBy::class,
                'url'     => !empty($params['poweredByUrl']) ? $params['poweredByUrl'] : null,
                'name'    => !empty($params['poweredByName']) ? $params['poweredByName'] : null,
                'version' => !empty($params['poweredByVersion']) ? $params['poweredByVersion'] : null,
                'options' => !empty($params['poweredByOptions']) ? $params['poweredByOptions'] : [],
            ],
            'LoginForm' => [
                'class' => \hiqdev\thememanager\widgets\LoginForm::class,
            ],
            'SocialLinks' => [
                'class' => \hiqdev\thememanager\widgets\SocialLinks::class,
                'links' => !empty($params['socialLinks']) ? $params['socialLinks'] : [],
            ],
            'CopyrightYears' => [
                'class' => \hiqdev\thememanager\widgets\CopyrightYears::class,
                'years' => !empty($params['copyrightYears']) ? $params['copyrightYears'] : null,
                'year'  => !empty($params['copyrightYear']) ? $params['copyrightYear'] : null,
            ],
            'OrganizationLink' => [
                'class' => \hiqdev\thememanager\widgets\OrganizationLink::class,
                'url'     => !empty($params['organizationUrl']) ? $params['organizationUrl'] : null,
                'name'    => !empty($params['organizationName']) ? $params['organizationName'] : null,
                'options' => !empty($params['organizationOptions']) ? $params['organizationOptions'] : [],
            ],
            'LogoLink' => [
                'class' => \hiqdev\thememanager\widgets\LogoLink::class,
                'image' => !empty($params['logoImage']) ? $params['logoImage'] : null,
                'name'  => !empty($params['logoName']) ? $params['logoName'] :
                          (!empty($params['organizationName']) ? $params['organizationName'] : 'Logo'),
                'url'   => !empty($params['logoUrl']) ? $params['logoUrl'] : '/',
                'options' => !empty($params['logoOptions']) ? $params['logoOptions'] : [],
            ],
        ],
    ],
];
