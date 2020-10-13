<?php

/**
 * @apiGroup           Users
 * @apiName            createAdmin
 * @api                {post} /v1/admins Create Admin type Users
 * @apiDescription     Create non client users for the Dashboard.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  email
 * @apiParam           {String}  password
 * @apiParam           {String}  name
 *
 * @apiUse             UserSuccessSingleResponse
 */

$router->post('changepassword', [
    'as' => 'api_user_change_password',
    'uses'  => 'Controller@changePassword',
    'middleware' => [
        'auth:api',
    ],
]);
