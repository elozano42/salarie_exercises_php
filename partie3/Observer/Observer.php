<?php

class AddEmployeeHandler
{
    public function handle(Employe $employe)
    {
        echo '1 user was add: ' . $employe->name . PHP_EOL;
    }
}
class DeleteEmployeeHandler
{
    public function handle(Employe $employe)
    {
        echo '1 user was delete: ' . $employe->name . PHP_EOL;
    }
}