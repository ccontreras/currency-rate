<?php

require_once 'src/CurrencyConverter.php';

echo ($value = \becrox\CurrencyConverter::convert('USD', 'DOP', 1)) !== null ? number_format($value, 2, '.', ',') : 'No data';
