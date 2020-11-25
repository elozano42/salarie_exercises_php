<?php

include 'Employe.php';
include 'Staff.php';
include 'Independant.php';
include 'Usine.php';
include 'Factories/EmployeFactory.php';
include 'Builders/InvoicesBuilder.php';
include 'Facades/UsineFacade.php';
include 'Iterator/InvoiceList.php';

$invoiceList1 = new InvoiceList();
$invoiceList1->addInvoice('2020-10-02', 1500, 'Facture 1');
$invoiceList1->addInvoice('2020-10-02', 1700, 'Facture 2');
$invoiceList1->addInvoice('2020-10-02', 3500, 'Facture 3');

$invoiceList2 = new InvoiceList();
$invoiceList2->addInvoice('2020-10-02', 1500, 'Facture 1');
$invoiceList2->addInvoice('2020-10-02', 5000, 'Facture 2');
$invoiceList2->addInvoice('2020-10-02', 1500, 'Facture 3');

$inde1 = EmployeeFactory::create('Independant', ["tata", "Stoktout", 30, "2011", 569032, $invoiceList1]);
$inde1->getInvoices()->addInvoice('2020-10-05', 3000, 'Facture 4');
foreach($inde1->getInvoices() as $invoice) {
  echo $invoice->getLabel() . PHP_EOL;
}

$usine = new UsineFacade(new Usine());
$usine->openUsine();

$myEmployees = Single::getInstance();
$myEmployees->addEmploye(EmployeeFactory::create('Salesman', ["Pierre", "Business", 45, "1995", 30000]));
$myEmployees->addEmploye(EmployeeFactory::create('Representant', ["Léon", "Ventout", 25, "2001", 20000]));
$myEmployees->addEmploye(EmployeeFactory::create('Producer', ["Yves", "Ahalouest", 28, "1998", 1000]));
$myEmployees->addEmploye(EmployeeFactory::create('Wharehouseman', ["Jeanne", "Stoktout", 32, "1998", 45]));
$myEmployees->addEmploye(EmployeeFactory::create('ProducerWithRisk', ["Jean", "Flippe", 28, "2000", 1000]));
$myEmployees->addEmploye($inde1);
$myEmployees->addEmploye(EmployeeFactory::create('Independant', ["tutu", "Ahalouest", 30, "2013", 320910, $invoiceList2]));

$myEmployees->displaySalaries();
$myEmployees->displayAverageSalary();
$usine->closeUsine();