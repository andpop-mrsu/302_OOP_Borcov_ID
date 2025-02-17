<?php

class Fraction
{
    private $numerator;
    private $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        if ($denominator == 0) {
            throw new InvalidArgumentException("Denominator cannot be zero.");
        }

        $gcd = $this->gcd(abs($numerator), abs($denominator));
        $this->numerator = $numerator / $gcd;
        $this->denominator = $denominator / $gcd;

        if ($this->denominator < 0) {
            $this->numerator *= -1;
            $this->denominator *= -1;
        }
    }

    public function getNumer(): int
    {
        return $this->numerator;
    }

    public function getDenom(): int
    {
        return $this->denominator;
    }

    public function add(Fraction $frac): Fraction
    {
        $newNumer = $this->numerator * $frac->getDenom() + $frac->getNumer() * $this->denominator;
        $newDenom = $this->denominator * $frac->getDenom();
        return new Fraction($newNumer, $newDenom);
    }

    public function sub(Fraction $frac): Fraction
    {
        $newNumer = $this->numerator * $frac->getDenom() - $frac->getNumer() * $this->denominator;
        $newDenom = $this->denominator * $frac->getDenom();
        return new Fraction($newNumer, $newDenom);
    }

    public function __toString(): string
    {
        $whole = intdiv($this->numerator, $this->denominator);
        $remainderNumer = abs($this->numerator % $this->denominator);

        if ($whole == 0) {
            return "{$this->numerator}/{$this->denominator}";
        } elseif ($remainderNumer == 0) {
            return (string)$whole;
        } else {
            return "{$whole}`{$remainderNumer}/{$this->denominator}";
        }
    }

    private function gcd(int $a, int $b): int
    {
        while ($b != 0) {
            $temp = $a % $b;
            $a = $b;
            $b = $temp;
        }
        return $a;
    }
}