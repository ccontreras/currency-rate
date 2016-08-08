<?php

namespace becrox;

/**
 * Convert currency to any valid symbol
 *
 * @author Cesar Contreras <ccdl15c@gmail.com>
 * @package linom
 * @version v0.0.1-alpha
 */
class CurrencyConverter {

    /** @var string The converter service endpoint. */
    private static $endpoint = 'http://www.google.com/finance/converter';

    public static $error;

    /**
     * Convert currencies.
     *
     * @param    string        $from      From currency.
     * @param    string        $to        To currency.
     * @param    double|int    $amount    The amount to be converted.
     * @return   double
     */
    public static function convert($from, $to, $amount) {
        $amount = urlencode($amount);
        $from = urlencode($from);
        $to = urlencode($to);

        $url = static::$endpoint."?a=$amount&from=$from&to=$to";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $rawData = curl_exec($ch);

        curl_close($ch);

        if (preg_match('/bld>([\d\.]+)/', $rawData, $matches)) {
            return round($matches[1], 2);
        }

        return null;
    }

    private static function debug($data, $exit = true) {
        echo '<pre>';
        print_r($data);

        if ($exit) {
            exit;
        }
    }

}
