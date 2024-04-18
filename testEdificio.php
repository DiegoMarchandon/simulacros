<?php

include 'Edificio.php';
include 'Inmueble.php';
include 'Persona.php';

$persona1 = new Persona("DNI",12333456,"Pepe","Suarez",4456722);
$persona3 = new Persona("DNI",12333422,"Pedro","Suarez",446678);

$responsable = new Persona("DNI",27432561,"Carlos","Martinez",154321233);
$inmueble1 = new Inmueble(11,1,"local comercial",50000,$persona1);
$inmueble2 = new Inmueble(12,1,"local comercial",50000,null);
$inmueble3 = new Inmueble(13,2,"departamento",35000,$persona3);
$inmueble4 = new Inmueble(13,2,"departamento",35000,null);
$inmueble5 = new Inmueble(15,3,"departamento",35000,null);

$colObjDeptos = [$inmueble1,$inmueble2,$inmueble3,$inmueble4,$inmueble5];
$nuevoEdificio = new Edificio($colObjDeptos,$responsable);

echo "----------------------CUATRO---------------------\n";
print_r($nuevoEdificio->darInmueblesDisponiblesParaAlquiler("local comercial",4000));

echo "----------------------CINCO-----------------------\n";
$persona4= new Persona("DNI",28765436,"Mariela","Suarez",25543562);
if($nuevoEdificio->registrarAlquilerInmueble($inmueble5,$persona4)){
    echo "la accion no se concreto porque hay pisos anteriores disponibles.";
}else{
    echo "inmueble alquilado exitosamente.";
}
echo "\n----------------------SEIS-----------------------\n";
if($nuevoEdificio->registrarAlquilerInmueble($inmueble4,$persona4)){
    echo "la accion no se concreto porque hay pisos anteriores disponibles.";
}else{
    echo "inmueble alquilado exitosamente.";
}
echo "\n----------------------SIETE-----------------------\n";
echo $nuevoEdificio->calculaCostoEdificio(); #120000
echo "\n----------------------OCHO-----------------------\n";
echo $nuevoEdificio;


