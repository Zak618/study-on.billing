<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'api_auth' => [[], ['_controller' => 'App\\Controller\\AuthController::login'], [], [['text', '/api/v1/auth']], [], [], []],
    'api_register' => [[], ['_controller' => 'App\\Controller\\AuthController::register'], [], [['text', '/api/v1/register']], [], [], []],
    'get_current_user' => [[], ['_controller' => 'App\\Controller\\AuthController::getCurrentUser'], [], [['text', '/api/v1/users/current']], [], [], []],
    'app.swagger_ui' => [[], ['_controller' => 'nelmio_api_doc.controller.swagger_ui'], [], [['text', '/api/v1/doc']], [], [], []],
];
