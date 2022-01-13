<?php
namespace App\Models\Progress;

interface Measurable {
	function getLength();
	function getSent();
}