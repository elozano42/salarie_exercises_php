<?php

include 'Employe.php';
include 'Staff.php';
include 'Independant.php';

$listInvoice1 = [
  new Invoice('2020-10-02', 1500, 'Facture 1'),
  new Invoice('2020-10-04', 1700, 'Facture 2'),
  new Invoice('2020-10-05', 3500, 'Facture 3'),
];

$listInvoice2 = [
  new Invoice('2020-10-02', 1500, 'Facture 1'),
  new Invoice('2020-10-04', 4500, 'Frais de déplacement -'),
  new Invoice('2020-10-05', 1500, 'Facture 3'),
];

$myEmployees = new Staff();
$myEmployees->add(new Salesman("Pierre", "Business", 45, "1995", 30000));
$myEmployees->add(new Representant("Léon", "Ventout", 25, "2001", 20000));
$myEmployees->add(new Producer("Yves", "Ahalouest", 28, "1998", 1000));
$myEmployees->add(new Wharehouseman("Jeanne", "Stoktout", 32, "1998", 45));
$myEmployees->add(new ProducerWithRisk("Jean", "Flippe", 28, "2000", 1000));
$myEmployees->add(new Independant("tata", "Stoktout", 30, "2011", 569032, $listInvoice1));
$myEmployees->add(new Independant("tutu", "Ahalouest", 30, "2013", 320910, $listInvoice2));

$myEmployees->displaySalaries();
$myEmployees->displayAverageSalary();
