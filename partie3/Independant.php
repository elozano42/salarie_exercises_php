<?php
include_once('Employe.php');

class Independant extends Employe
{
  public $siren;
  public $invoices;
  protected $counter;

  public function __construct($name, $lastname, $age, $year, $siren, $invoices)
  {
    parent::__construct($name, $lastname, $age, $year);
    $this->siren = $siren;
    $this->invoices = $invoices;
  }

  public function getName()
  {
    return "Employé indépendant: '$this->name'";
  }

  public function getSalary()
  {
    $totalAmount = 0;
    foreach($this->invoices as $invoice) {
      if (strpos("Frais de déplacement -", $invoice->getLabel()) === false) {
        $totalAmount += $invoice->amount;
      }
    }
    return $totalAmount;
  }

  public function getInvoices()
  {
    return $this->invoices;
  }
}