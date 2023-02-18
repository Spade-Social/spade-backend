<?php

namespace App\Enums;

interface EnumInterface
{
    public function values(): array;

    public static function make(): EnumInterface;
}
