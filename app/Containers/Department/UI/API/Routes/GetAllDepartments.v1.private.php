<?php

/**
 * @apiGroup           Department
 * @apiName            getAllDepartments
 *
 * @api                {GET} /v1/departments Endpoint title here..
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
$router->get('departments', [
    'as' => 'api_department_get_all_departments',
    'uses'  => 'Controller@getAllDepartments',
    'middleware' => [
      'auth:api',
    ],
]);
