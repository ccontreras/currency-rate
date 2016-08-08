<?php

require_once 'src/CurrencyRate.php';

echo ($value = \becrox\CurrencyRate::convert('USD', 'DOP', 1)) !== null ? number_format($value, 2, '.', ',') : 'No data';
