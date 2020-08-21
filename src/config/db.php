<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=devmyext',
    'dsn' => 'sqlite:@app/data/devmyext.sqlite',
    'dsn' => 'pgsql:host=localhost;dbname=devmyext',
    'username' => 'devmyext',
    'password' => 'devmyext',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
