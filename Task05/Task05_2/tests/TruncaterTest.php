<?php

declare(strict_types=1);

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    private const FULL_NAME = 'Борцов Игорь Дмитриевич'; // Замените на свои ФИО

    public function testTruncateEmptyString(): void
    {
        $truncater = new Truncater();
        $this->assertEquals('', $truncater->truncate(''));
    }

    public function testTruncateWithDefaultOptions(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate(self::FULL_NAME);
        $this->assertEquals(self::FULL_NAME, $result); // Имя короче 50 символов
    }

    public function testTruncateWithCustomLength10(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate(self::FULL_NAME, ['length' => 10]);
        $this->assertEquals('Борцов Иго...', $result);
    }

    public function testTruncateWithCustomLength50(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate(self::FULL_NAME, ['length' => 50]);
        $this->assertEquals(self::FULL_NAME, $result);
    }

    public function testTruncateWithNegativeLength(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate(self::FULL_NAME, ['length' => -10]);
        $this->assertEquals('...', $result);
    }

    public function testTruncateWithCustomSeparator(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate(self::FULL_NAME, ['length' => 10, 'separator' => '*']);
        $this->assertEquals('Борцов Иго*', $result);
    }

    public function testTruncateWithOnlySeparator(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate(self::FULL_NAME, ['separator' => '*']);
        $this->assertEquals(self::FULL_NAME, $result); // Имя короче 50
    }

    public function testTruncateWithCustomConstructorOptions(): void
    {
        $truncater = new Truncater(['length' => 10, 'separator' => '*']);
        $result = $truncater->truncate(self::FULL_NAME);
        $this->assertEquals('Борцов Иго*', $result);
    }

    public function testDefaultOptionsNotOverwritten(): void
    {
        $truncater = new Truncater(['length' => 10]);
        $truncater->truncate(self::FULL_NAME, ['length' => 5]);
        $result = $truncater->truncate(self::FULL_NAME);
        $this->assertEquals('Борцов Иго...', $result);
    }
}