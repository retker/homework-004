<?php

require_once 'car.php';

$RIO = new Car(90/*enginePower*/, 'Mechanic'/*transmissionType*/);
$RIO->move(100, 10);
$RIO->move(50, 10, 'backward');
