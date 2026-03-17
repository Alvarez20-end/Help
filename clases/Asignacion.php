<?php
include "Conexion.php";

class Asignacion extends Conexion {

    public function agregarAsignacion($datos) {

        $conexion = Conexion::conectar();

        $sql = "INSERT INTO t_asignacion (
                    id_persona,
                    id_equipo,
                    marca,
                    modelo,
                    color,
                    descripcion,
                    memoria,
                    disco_duro,
                    procesador
                )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query = $conexion->prepare($sql);

        $query->bind_param(
            "iisssssss",
            $datos['idPersona'],
            $datos['idEquipo'],
            $datos['marca'],
            $datos['modelo'],
            $datos['color'],
            $datos['descripcion'],
            $datos['memoria'],
            $datos['discoDuro'],
            $datos['procesador']
        );

        $respuesta = $query->execute();

        $query->close();

        return $respuesta;
    }


    // 🔥 MÉTODO QUE TE FALTABA
    public function eliminarAsignacion($idAsignacion){

        $conexion = Conexion::conectar();

        $sql = "DELETE FROM t_asignacion WHERE id_asignacion = ?";

        $query = $conexion->prepare($sql);

        if(!$query){
            return "Error prepare: " . $conexion->error;
        }

        $query->bind_param("i", $idAsignacion);

        $resultado = $query->execute();

        if(!$resultado){
            return "Error execute: " . $query->error;
        }

        $query->close();

        return 1; // 🔥 importante para JS
    }

}
?>