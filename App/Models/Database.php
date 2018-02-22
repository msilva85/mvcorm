<?php
namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
  public function __construct(){
    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => DATABASE['driver'] ?? 'mysql',
        'host'      => DATABASE['host'] ?? 'localhost',
        'database'  => DATABASE['dbname'] ?? 'tienda',
        'username'  => DATABASE['user'] ?? 'my-username',
        'password'  => DATABASE['password'] ?? 'my-password',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);
    $capsule->bootEloquent();
  }
}
