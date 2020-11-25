<?php

class Invoice
{
  public $date;
  public $amount;
  public $label;

  public function __construct(InvoiceBuilder $invoiceBuilder)
  {
    $this->date = $invoiceBuilder->date;
    $this->amount = $invoiceBuilder->amount;
    $this->label = $invoiceBuilder->label;
  }

  public function getLabel()
  {
    return $this->label;
  }

  public function getAmount()
  {
    return $this->getAmount;
  }
  public function isSame(Invoice $invoiceComp)
  {
    return ($invoiceComp->date === $this->date
            && $invoiceComp->amount === $this->label);
  }
}