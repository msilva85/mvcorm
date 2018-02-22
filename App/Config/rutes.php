<?php
define('ROUTES', [
    ''        => ['controller' => 'Page', 'action' => 'index'],
    'Clientes'        => ['controller' => 'Page', 'action' => 'index'],
    'clientes/listar'  => ['controller' => 'Page', 'action' => 'listar'],
    'clientes/guardaryeditar' => ['controller' => 'Page', 'action' => 'guardaryeditar'],
    'clientes/mostrar' => ['controller' => 'Page', 'action' => 'mostrar'],
    'clientes/eliminar' => ['controller' => 'Page', 'action' => 'eliminar'],
]);
