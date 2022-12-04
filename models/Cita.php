<?php

namespace Model;

class cita extends ActiveRecord {
    // Base de Datos
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id', 'hora', 'fecha', 'usuarioId'];

    public $id;
    public $hora;
    public $fecha;
    public $usuarioId;

    public function __construct($args = [])
    {   
        $this->id = $args ['id'] ?? null;
        $this->hora = $args ['hora'] ?? '';
        $this->fecha = $args ['fecha'] ?? '';
        $this->usuarioId = $args ['usuarioId'] ?? '';
    }
}