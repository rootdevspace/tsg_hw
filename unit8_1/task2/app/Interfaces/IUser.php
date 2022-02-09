<?php

declare(strict_types=1);

namespace Interfaces;

interface IUser {

    public function getName(): string;

    public function setName(string $name): void;

    public function getAge(): int;

    public function setAge(int $age): void;

    public function getGender(): string;

    public function setGender(string $gender): void;
}
