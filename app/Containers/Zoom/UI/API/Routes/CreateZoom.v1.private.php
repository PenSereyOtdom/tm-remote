<?php

/**
 * @apiGroup           Zoom
 * @apiName            createZoom
 *
 * @api                {POST} /v1/zooms Create Zoom
 * @apiDescription     Call create zoom meeting api and save to db
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  topic
 * @apiParam           {String}  start_time
 * @apiParam           {String}  password
 * @apiParam           {String}  note
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    {
        "data": {
            "object": "Zoom",
            "id": "hashed_id",
            "topic": "topic",
            "join_url": "url",
            "start_time": "2020-11-11T14:39:55.000000Z",
            "password": "123456",
            "meeting_id": 12345436324,
            "note": "testing note",
            "created_at": "2020-11-11T14:39:16.000000Z",
            "updated_at": "2020-11-11T14:39:16.000000Z",
            "host_id": "YDMWM-d3Q-ypjklI6231HQ",
            "user_id": 1,
            "real_id": 3
        },
        "meta": {
            "include": [
                "user"
            ],
            "custom": []
        }
    }
}
 */

/** @var Route $router */
$router->post('zooms', [
    'as' => 'api_zoom_create_zoom',
    'uses'  => 'Controller@createZoom',
    'middleware' => [
      'auth:api',
    ],
]);
