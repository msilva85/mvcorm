<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Cliente extends Model
{
  protected $table = 'cliente';
  protected $fillable = ['rut', 'nombre', 'direccion', 'telefono'];
  protected $primaryKey  = 'id';
  public $timestamps = false;
}
