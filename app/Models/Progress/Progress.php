<?php

namespace App\Models\Progress;

class Progress{
    public $file;
    public function __construct(Measurable $file) {
        $this->file = $file;
    }

    public function getAsPercent() {
        return $this->file->getSent() * 100 / $this->file->getLength();
    }
}