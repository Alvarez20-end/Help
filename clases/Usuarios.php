<?php

include "Conexion.php";

class Usuarios extends Conexion {

    public function loginUsuario($usuario, $password) {
        $conexion = Conexion::conectar();

        $sql = "SELECT * FROM t_usuarios 
                WHERE usuario = '$usuario' AND password = '$password'";

        $respuesta = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($respuesta) > 0) {
            $datosUsuario = mysqli_fetch_array($respuesta);

            $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
            $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
            $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];

            return 1;
        } else {
            return 0;
        }
    }

    public function agregarNuevaPersona($datos) {

        $conexion = Conexion::conectar();

        $sql = "INSERT INTO t_persona (
                    paterno,
                    materno,
                    nombre,
                    fecha_nacimiento,
                    sexo,
                    telefono,
                    correo
                ) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $query = $conexion->prepare($sql);

        $query->bind_param(
            "sssssss",
            $datos['paterno'],
            $datos['materno'],
            $datos['nombre'],
            $datos['fechaNacimiento'],
            $datos['sexo'],
            $datos['telefono'],
            $datos['correo']
        );

        $query->execute();
        $idPersona = $query->insert_id;
        $query->close();

        return $idPersona;
    }

    public function agregarNuevoUsuario($datos) {

        $conexion = Conexion::conectar();
        $idPersona = self::agregarNuevaPersona($datos);

        if ($idPersona > 0) {

            $sql = "INSERT INTO t_usuarios (
                        id_rol,
                        id_persona,
                        usuario,
                        password,
                        ubicacion
                    ) VALUES (?, ?, ?, ?, ?)";

            $query = $conexion->prepare($sql);

            $query->bind_param(
                "iisss",
                $datos['idRol'],
                $idPersona,
                $datos['usuario'],
                $datos['password'],
                $datos['ubicacion']
            );

            $respuesta = $query->execute();
            return $respuesta;

        } else {
            return 0;
        }
    }

    public function actualizarUsuario($datos) {

        $conexion = Conexion::conectar();

        $exitoPersona = self::actualizarPersona($datos);

        if ($exitoPersona) {

            $sql = "UPDATE t_usuarios SET 
                        id_rol = ?,
                        usuario = ?,
                        ubicacion = ?
                    WHERE id_usuario = ?";

            $query = $conexion->prepare($sql);

            $query->bind_param(
                "issi",
                $datos['idRol'],
                $datos['usuario'],
                $datos['ubicacion'],
                $datos['idUsuario']
            );

            $respuesta = $query->execute();
            $query->close();

            return $respuesta;

        } else {
            return 0;
        }
    }

    public function actualizarPersona($datos) {

        $conexion = Conexion::conectar();

        $idPersona = self::obtenerIdPersona($datos['idUsuario']);

        if (!$idPersona) {
            return 0;
        }

        $sql = "UPDATE t_persona SET 
                    paterno = ?,
                    materno = ?,
                    nombre = ?,
                    fecha_nacimiento = ?,
                    sexo = ?,
                    telefono = ?,
                    correo = ?
                WHERE id_persona = ?";

        $query = $conexion->prepare($sql);

        $query->bind_param(
            "sssssssi",
            $datos['paterno'],
            $datos['materno'],
            $datos['nombre'],
            $datos['fechaNacimiento'],
            $datos['sexo'],
            $datos['telefono'],
            $datos['correo'],
            $idPersona
        );

        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function obtenerIdPersona($idUsuario) {

        $conexion = Conexion::conectar();

        $sql = "SELECT
                    persona.id_persona AS idPersona
                FROM t_usuarios AS usuarios
                INNER JOIN t_persona AS persona 
                    ON usuarios.id_persona = persona.id_persona
                WHERE usuarios.id_usuario = '$idUsuario'";

        $respuesta = mysqli_query($conexion, $sql);

        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            $fila = mysqli_fetch_array($respuesta);
            return $fila['idPersona'];
        } else {
            return 0;
        }
    }

    // 🔥 FUNCIÓN QUE TE FALTABA BIEN HECHA
    public function resetPassword($datos) {

        $conexion = Conexion::conectar();

        // 🔐 encriptar password
        $passwordHash = password_hash($datos['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE t_usuarios 
                SET password = ?
                WHERE id_usuario = ?";

        $query = $conexion->prepare($sql);

        $query->bind_param(
            "si",
            $passwordHash,
            $datos['idUsuario']
        );

        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }
    public function obtenerDatosUsuario($idUsuario) {

    $conexion = Conexion::conectar();

    $sql = "SELECT
                usuarios.id_usuario AS idUsuario,
                persona.nombre AS nombrePersona,
                persona.paterno AS paterno,
                persona.materno AS materno,
                persona.telefono AS telefono,
                persona.correo AS correo,
                persona.fecha_nacimiento AS fechaNacimiento
            FROM t_usuarios AS usuarios
            INNER JOIN t_persona AS persona 
                ON usuarios.id_persona = persona.id_persona
            WHERE usuarios.id_usuario = ?";

    $query = $conexion->prepare($sql);
    $query->bind_param("i", $idUsuario);
    $query->execute();

    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    } else {
        return null;
    }
}
public function cambiarEstatus($datos) {

    $conexion = Conexion::conectar();

    $sql = "UPDATE t_usuarios 
            SET activo = ?
            WHERE id_usuario = ?";

    $query = $conexion->prepare($sql);

    if (!$query) {
        return 0;
    }

    $query->bind_param(
        "ii",
        $datos['estatus'],
        $datos['idUsuario']
    );

    $respuesta = $query->execute();

    if (!$respuesta) {
        return 0;
    }

    $query->close();

    return 1;
}

}