<?php
require_once "conecta.php";

function formatarPreco(float $number):string {
       return "R$ " .number_format($number, 2, ",", ".");
};















?>