# About developing extension

## Fix bug of yii2-pages

This is how to fix bug and contribute code to [bupy7/yii2-pages](https://github.com/bupy7/yii2-pages)

### Create a fork of bupy7/yii2-pages, pull code to local

* In [bupy7/yii2-pages](https://github.com/bupy7/yii2-pages) github, click Fork button. This will create a fork on my [Github repository](https://github.com/umbalaconmeogia/yii2-pages)
* Clone the fork to local PC
  ```shell
  git clone https://github.com/umbalaconmeogia/yii2-pages.git
  ```
* Add the repo of [bupy7/yii2-pages](https://github.com/bupy7/yii2-pages) to my current configuration
  ```shell
  git remote add upstream https://github.com/bupy7/yii2-pages.git
  ```
* Confirm that the upstream repository has been added
  ```shell
  git remote -v
  ```
  And the output is
  <pre>
  origin  https://github.com/umbalaconmeogia/yii2-pages.git (fetch)
  origin  https://github.com/umbalaconmeogia/yii2-pages.git (push)
  upstream        https://github.com/bupy7/yii2-pages.git (fetch)
  upstream        https://github.com/bupy7/yii2-pages.git (push)
  </pre>
* Create a branch to change the code
  ```shell
  git checkout -b workWithPostgreAndSqlite
  ```

### Add yii2-pages to yii2-devmyext application

* Add `yii2-pages` to yii2-devmyext configuration.
  On the `yii2-devmyext` directory, which is at the same level with `yii2-pages`, edit `composer.json`
  ```php
    "minimum-stability": "dev",
    "require": {
        /* Another stuff */
        "bupy7/yii2-pages": "@dev"
    },
    "repositories": [
        /* Another stuff */
		{
            "type": "path",
            "url": "../../yii2-pages",
            "symlink": true
        }
    ]
  ```
* Run `composer` to install yii2-pages (this will create symbolic link to vendor director)
  ```shell
  composer update bupy7/yii2-pages
  ```
  And the output is
  <pre>
  Loading composer repositories with package information
  Updating dependencies (including require-dev)
  Package operations: 2 installs, 0 updates, 0 removals
    - Installing vova07/yii2-imperavi-widget (2.0.11): Loading from cache
    - Installing bupy7/yii2-pages (dev-master a5c8e5d): Cloning a5c8e5d748 from cache
  Writing lock file
  Generating autoload files
  </pre>
* Add `pages` module into yii2-devmyext configuration files.
  Add to `config/console.php`
  ```php
    'modules' => [
        'pages' => 'bupy7\pages\Module',
    ],
  ```
  Add to `config/web.php`
  ```php
    'components' => [
        // Other stuffs
        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'showScriptName' => false,
            'rules' => [
                'pages/<page:[\w-]+>' => 'pages/default/index',
            ],
        ],
    ],
    'modules' => [
        'pages' => [
            'class' => 'bupy7\pages\Module',
            'controllerMap' => [
                'manager' => [
                    'class' => 'bupy7\pages\controllers\ManagerController',
                    'as access' => [
                        'class' => 'yii\filters\AccessControl',
                        'rules' => [
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
  ```
* Run migration
  ```shell
  ./yii migrate/up --migrationPath=@bupy7/pages/migrations
  ```

### Add the code change

### Make pull request