<?php

declare(strict_types=1);

namespace Interfaces;

interface IEmployee extends IUser {

    public function getSalary(): float;

    public function setSalary(float $salary): void;
}
