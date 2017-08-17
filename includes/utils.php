<?php

error_reporting(E_ERROR);

//Utilerias
// Enviar codigo de error
function exception($code = 500, $msg) {
    switch ($code) {
        case 403: $text = 'Forbidden';
            break;
        case 404: $text = 'Not Found';
            break;
        case 500: $text = 'Internal Server Error';
            break;
    }

    $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

    header($protocol . ' ' . $code . ' ' . $text);
    echo $msg;
}

// Sanitizar entrada
function sanitize($str, $quotes = ENT_NOQUOTES) {
    $str = htmlspecialchars($str, $quotes);
    return $str;
}

function toJSON($var) {
    header("Content-Type: application/json", true);
    echo json_encode(utf8_encode_all($var), JSON_NUMERIC_CHECK);
}

function toJSONManual($datos) {
    echo '[';
    $i = 1;
    foreach ($datos as $llave) {
        $j = 1;
        echo '{';
        foreach ($llave as $key => $value) {
            echo '"' . $key . '":"' . $value . '"';
            if ($j < count($llave)) {
                echo ",";
            }
            $j++;
        }

        if ($i == count($datos)) {
            echo '}';
        } else {
            echo '},';
        }

        $i++;
    }
    echo ']';
}

function selCat($tabla, $campos, $where = [], $order = '', $id, $class = 'form-control') {
    require('/../includes/db.php');
    if ($order != '') {
        $where['ORDER'] = $order;
    }
    $tabla = $db->select($tabla, $campos, $where);
    $sel = "
			<select id='$id' name='$id' class='$class'>
				<option value=''>Seleccione...</option>
			";
    foreach ($tabla as $r) {
        $sel .= "<option value='" . $r['key'] . "'>" . $r['value'] . "</option>";
    }
    $sel .= "</select>";

    echo $sel;
}

function money_format($format, $number) {
    $regex = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?' .
            '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
    if (setlocale(LC_MONETARY, 0) == 'C') {
        setlocale(LC_MONETARY, '');
    }
    $locale = localeconv();
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER);
    foreach ($matches as $fmatch) {
        $value = floatval($number);
        $flags = array(
            'fillchar' => preg_match('/\=(.)/', $fmatch[1], $match) ?
            $match[1] : ' ',
            'nogroup' => preg_match('/\^/', $fmatch[1]) > 0,
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ?
            $match[0] : '+',
            'nosimbol' => preg_match('/\!/', $fmatch[1]) > 0,
            'isleft' => preg_match('/\-/', $fmatch[1]) > 0
        );
        $width = trim($fmatch[2]) ? (int) $fmatch[2] : 0;
        $left = trim($fmatch[3]) ? (int) $fmatch[3] : 0;
        $right = trim($fmatch[4]) ? (int) $fmatch[4] : $locale['int_frac_digits'];
        $conversion = $fmatch[5];

        $positive = true;
        if ($value < 0) {
            $positive = false;
            $value *= -1;
        }
        $letter = $positive ? 'p' : 'n';

        $prefix = $suffix = $cprefix = $csuffix = $signal = '';

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign'];
        switch (true) {
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+':
                $prefix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+':
                $suffix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+':
                $cprefix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+':
                $csuffix = $signal;
                break;
            case $flags['usesignal'] == '(':
            case $locale["{$letter}_sign_posn"] == 0:
                $prefix = '(';
                $suffix = ')';
                break;
        }
        if (!$flags['nosimbol']) {
            $currency = $cprefix .
                    ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) .
                    $csuffix;
        } else {
            $currency = '';
        }
        $space = $locale["{$letter}_sep_by_space"] ? ' ' : '';

        $value = number_format($value, $right, $locale['mon_decimal_point'], $flags['nogroup'] ? '' : $locale['mon_thousands_sep']);
        $value = @explode($locale['mon_decimal_point'], $value);

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
        if ($left > 0 && $left > $n) {
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
        }
        $value = implode($locale['mon_decimal_point'], $value);
        if ($locale["{$letter}_cs_precedes"]) {
            $value = $prefix . $currency . $space . $value . $suffix;
        } else {
            $value = $prefix . $value . $space . $currency . $suffix;
        }
        if ($width > 0) {
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ?
                    STR_PAD_RIGHT : STR_PAD_LEFT);
        }

        $format = str_replace($fmatch[0], $value, $format);
    }
    return $format;
}

function utf8_encode_all($dat) { // -- It returns $dat encoded to UTF8 
    if (is_string($dat))
        return utf8_encode($dat);
    if (!is_array($dat))
        return $dat;
    $ret = array();
    foreach ($dat as $i => $d)
        $ret[$i] = utf8_encode_all($d);
    return $ret;
}

/* ....... */

function utf8_decode_all($dat) { // -- It returns $dat decoded from UTF8 
    if (is_string($dat))
        return utf8_decode($dat);
    if (!is_array($dat))
        return $dat;
    $ret = array();
    foreach ($dat as $i => $d)
        $ret[$i] = utf8_decode_all($d);
    return $ret;
}
