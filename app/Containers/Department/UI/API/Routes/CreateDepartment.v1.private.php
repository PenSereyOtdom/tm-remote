<?php

/**
 * @apiGroup           Department
 * @apiName            createDepartment
 *
 * @api                {POST} /v1/departments Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('departments', [
    'as' => 'api_department_create_department',
    'uses'  => 'Controller@createDepartment',
    'middleware' => [
      'auth:api',
    ],
]);
