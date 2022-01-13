<?php

namespace App\Models\Progress;

class Music implements Measurable{
    private $lenght;
    private $sent;

    public function getLength(): int{
        return $this->lenght;
    }

    public function getSent(): int{
        return $this->sent;
    }

    public function setLength(int $lenght): void{
        $this->lenght = $lenght;
    }

    public function setSent(int $sent): void{
        $this->sent = $sent;
    }
}