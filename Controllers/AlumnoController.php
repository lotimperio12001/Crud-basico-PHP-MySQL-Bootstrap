<?php

/**
*
*/
class UsuarioController
{
    public function __construct()
    {

    }

    public function index()
    {
        require_once('Views/Alumno/bienvenido.php');
    }

    public function register()
    {
        require_once('Views/Alumno/register.php');
    }

    public function save()
    {
        if (!isset($_POST['estado'])) {
            $estado = "of";
        } else {
            $estado = "on";
        }
        $alumno = new Alumno(null, $_POST['nombres'], $_POST['apellidos'], $estado);

        Alumno::save($alumno);
        $this->show();
    }

    public function show()
    {
        $listaAlumnos = Alumno::all();

        require_once('Views/Alumno/show.php');
    }

    public function updateshow()
    {
        $id = $_GET['idAlumno'];
        $alumno = Alumno::searchById($id);
        require_once('Views/Alumno/updateshow.php');
    }

    public function update()
    {
        $alumno = new Alumno($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['estado']);
        Alumno::update($alumno);
        $this->show();
    }
    public function delete()
    {
        $id = $_GET['id'];
        Alumno::delete($id);
        $this->show();
    }

    public function search()
    {
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $alumno = Alumno::searchById($id);
            $listaAlumnos[] = $alumno;
            //var_dump($id);
            //die();
            require_once('Views/Alumno/show.php');
        } else {
            $listaAlumnos = Alumno::all();

            require_once('Views/Alumno/show.php');
        }


    }

    public function error()
    {
        require_once('Views/Alumno/error.php');
    }

}
