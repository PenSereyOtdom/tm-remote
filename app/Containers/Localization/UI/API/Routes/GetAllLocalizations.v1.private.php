<?php

/**
 * @apiGroup           Localization
 * @apiName            getAllLocalizations
 *
 * @api                {GET} /v1/localizations Get all localizations
 * @apiDescription     Return all available localizations that are "configured" in the application
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
{
    "data": {
        "object": "Zoom",
        "id": "mdjw8454a5xb39pq",
        "topic": "test from postman",
        "join_url": "https://zoom.us/j/99403110086?pwd=ak56eUs2bDBaOXNFS1c4Nm5RN1NUdz09",
        "start_time": "2020-11-11T14:39:55.000000Z",
        "password": "123456",
        "meeting_id": 99403110086,
        "note": "testing note",
        "created_at": "2020-11-11T14:39:16.000000Z",
        "updated_at": "2020-11-11T14:39:16.000000Z",
        "host_id": "YDMWM-d3Q-ypcz1I6qCXHQ",
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

$router->get('localizations', [
    'as' => 'api_localization_get_all_localizations',
    'uses'  => 'Controller@getAllLocalizations',
    'middleware' => [
      'auth:api',
    ],
]);
