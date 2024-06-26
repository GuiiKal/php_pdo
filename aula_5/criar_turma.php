<?php 

use aula_5\Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use aula_5\Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use aula_5\Alura\Pdo\Domain\Model\Student; 

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();

$aStudent = new Student(
    null,
    'Nico Steppat',
    new DateTimeimmutable('1985-05-01')
);

$studentRepository->save($aStudent);

$anotherStudent = new Student(
    null,
    'Sergio Lopes',
    new DateTimeimmutable('1985-05-01')
);

$studentRepository->save($anotherStudent);

$connection->commit();