<?php
namespace App\Controllers;

use App\Models\Cliente as Cliente;
use App\Libreries\View as View;

class PageController extends View
{

  public function index(){
    $this->render('pages/index', compact(''));
  }

  public function listar(){
    $clientes = Cliente::all();
    $data = Array();

    foreach($clientes as $cliente){
      $data[] = array(
       '0' => '<button class="btn btn-warning" value="+ '.$cliente->id.'" ><i class="fas fa-edit"></i></button>'.
        ' <button class="btn btn-danger" value="- '.$cliente->id.'"><i class="fas fa-trash-alt"></i></button>',
       '1' => $cliente->rut,
       '2' => $cliente->nombre,
       '3' => $cliente->direccion,
       '4' => $cliente->telefono
      );
     }

     $results = array(
      "sEcho" =>1, //Información para el datables
      "iTotalRecords" =>count($data), //enviamos el total de registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data);

     $this->render('pages/listar',  compact('results') );
  }//fin de listar

  public function guardaryeditar(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $rut = $_POST['rut'];
      $nombre = $_POST['nombre'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $id = $_POST['idcliente'] ?? '';

     if(empty($id)){  //agregar nuevo usuario
        $cliente = new Cliente;
        $cliente->rut = $rut;
        $cliente->nombre = $nombre;
        $cliente->direccion = $direccion;
        $cliente->telefono = $telefono;
        $results = $cliente->save() ? "El Cliente ha sido ingresado" : "El Cliente no se pudo ingresar";
      }else{  //Actualizar usuario Existente
        $cliente = Cliente::find($id);
        $cliente->rut = $rut;
        $cliente->nombre = $nombre;
        $cliente->direccion = $direccion;
        $cliente->telefono = $telefono;
        $results = $cliente->save() ? 'El Cliente ha sido actualizado' : 'El Cliente ha no se pudo Actualizar';
      }

      $this->render('pages/listar', compact('results'));
    }
  }//fin de guardar o editar

  public function mostrar(){
    $id = $_POST['id'];

    $cliente = Cliente::where('id', $id)->get()->toArray();
    $results = $cliente[0];

    $this->render('pages/listar', compact('results'));
  }

  public function eliminar(){
    $id = $_POST['id'];

    $cliente = Cliente::where('id', $id)->delete();
    $results = $cliente ? 'El Cliente fue Eliminado' : 'El Cliente no se pudo Eliminar';

    $this->render('pages/listar', compact('results'));
  }
}
