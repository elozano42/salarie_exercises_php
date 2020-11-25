<?php
include 'Observer/Observer.php';

final class Single
{
  private static $instance;
  private static $observers = [];
  protected $counter;
  protected $employees;
  
  public static function getInstance(): Single
  {
    if (!self::$instance) {
      self::$observers['add'] = new AddEmployeeHandler();
      self::$observers['remove'] = new DeleteEmployeeHandler();
      self::$instance = new self();
    }   
    return self::$instance;
  }

  public function __construct(){}
  
  public function addEmploye($employee)
  {
    $this->employees[] = $employee;
    self::notify('add', $employee);
  }

  public function displaySalaries()
  {
    foreach($this->employees as $employee) {
      echo $employee->getName() . ' ' . $employee->getSalary() . PHP_EOL;
    }
  }

  public function displayAverageSalary()
  {
    $total = 0;
    foreach ($this->employees as $employee) {
       $total += $employee->getSalary();
    }
    echo 'Salaire moyen: ' .  $total / count($this->employees) . PHP_EOL;
  }

  public function removeEmploye(Employe $toRemove)
  {
    $this->employees = array_filter($this->employees, function (Employe $employe) use ($toRemove) {
        return $employe->isSame($toRemove);
    });
    self::notify('remove', $toRemove);
  }

  private static function notify($type, $instance)
  {
    self::$observers[$type]->handle($instance);
  }
}