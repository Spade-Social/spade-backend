<?php

namespace App\Enums;

abstract class AbstractEnum implements EnumInterface
{
    public function values(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }

    public static function make(): EnumInterface
    {
        return new static();
    }
}
