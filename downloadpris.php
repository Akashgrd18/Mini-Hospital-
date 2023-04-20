<?php

header('Content-Type: application/doc');

header('Content-Disposition: attachment; filename="patients.txt"');

readfile('patientsFiles/patients.txt');
?>