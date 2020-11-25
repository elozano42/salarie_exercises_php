<?php

include_once(__DIR__ . '/../Builders/InvoicesBuilder.php');

class InvoiceList implements Countable, Iterator
{
  private $invoices = [];
  protected $counter = 0;

  public function addInvoice($date, $amount, $label)
  {
      $this->invoices[] = (new InvoiceBuilder())
                            ->addDate($date)
                            ->addAmount($amount)
                            ->addLabel($label)
                            ->build();
  }

  public function removeInvoice(Invoice $toRemove)
  {
    $this->invoices = array_filter($this->invoices, function (Invoice $invoice) use ($toRemove) {
        return $invoice->isSame($toRemove);
    });
  }

  public function count(): int
  {
      return count($this->invoices);
  }

  public function current(): Invoice
  {
      return $this->invoices[$this->counter];
  }

  public function key()
  {
      return $this->counter;
  }

  public function next()
  {
      $this->counter++;
  }

  public function rewind()
  {
      $this->counter = 0;
  }

  public function valid(): bool
  {
      return isset($this->invoices[$this->counter]);
  }

  public function getInvoices()
  {
    return $this->invoices;
  }
}