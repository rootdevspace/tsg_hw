<?php

interface IEmployee extends IUser {

    public function getSalary(): float;

    public function setSalary(float $salary): void;
}
