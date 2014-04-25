<?php

switch ($_GET['func']) {
    case 'genkeys':
        genkeys();
        break;
    case 'auth':
        auth($_POST['y'], $_POST['q'], $_POST['s']);
        break;
    default:
}

function genkeys()
{
    $array = array();
    $dsa = new Pseudo_DSA;
    $array['x'] = $dsa->keygen(18);
    $array['y'] = $dsa->pub_keygen($array['x']);
    $array['q'] = time();
    $array['s'] = $dsa->encode($array['q'], $array['x']);

    echo json_encode($array);
}

function auth($pub_key, $time, $hash)
{
    if (!$pub_key) {
        $array['result'] = 'Ошибка: не определен публичный ключ';

    } else if (!$time) {
        $array['result'] = 'Ошибка: не определено время создания публичного ключа';

    } else if (!$hash) {
        $array['result'] = 'Ошибка: не определено закодированное значение';

    } else {

        $dsa = new Pseudo_DSA;

        $array = array();
        $array['date_in'] = time() - $time;

        $limit = 15;
        if ($array['date_in'] < $limit) {


            $result = $dsa->decode($time, $hash, $pub_key);

            if ($result) {
                $array['result'] = 'Успешно';
            } else {
                $array['result'] = 'Ошибка';
            }
        } else {
            $array['result'] = 'Ошибка: истек лимит времени';
        }
    }
    echo json_encode($array);
}

Class Pseudo_DSA
{
    private $salt = 'соль';

    function keygen($length = 10)
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    function pub_keygen($key)
    {
        return md5($key);
    }

    function encode($string, $key)
    {
        return sha1($string . md5($key) . $this->salt);
    }

    function decode($string, $hash, $pub_key)
    {
        $hash2 = sha1($string . $pub_key . $this->salt);

        return $hash == $hash2;
    }
}

//Class DSA
//{
//    // параметры
//    private $dsa_L = 1024; // размерность числа p
//    private $dsa_N = 160; // размерность хэш-функци, числа q
//    private $dsa_q; // простое число размерностью N
//    private $dsa_p; // простое число размерностью L, такое, что (p-1) делится на q,
//    private $dsa_g; // g=h^[(p-1)/q], где h = (1, p-1) и g<>1, например h=2
//
//    // ключи
//    private $dsa_x; // секретный ключ, x = (0; q)
//    private $dsa_y; // открытый ключ, y = ( g^x ) mod p
//
//    public function init()
//    {
//        $q = _prime();
//        $p = $q * 4 + 1;
//        $g = pow(2, ($p - 1) / $q);
//
//        $x = 3;//rand(1, $q - 1);
//        $y = pow($g, $x) % $p;
//
//        // генерация подписи
//        $k = 2;
//        $r = (pow($g, $k) % $p) % $q;
//
//        $hash = 5;//crc32(time());
//        $s = (1 / $k) * ($hash + $x * $r) % $q;
//
//        return array('g' => $g, 'p' => $p, 'q' => $q, 'x' => $x, 'y' => $y, 'r' => $r, 's' => $s, 'hash' => $hash);
//    }
//
//    public function ver()
//    {
//        $r = $_POST['r'];
//        $s = $_POST['s'];
//        $q = $_POST['q'];
//        $g = $_POST['g'];
//        $p = $_POST['p'];
//        $y = $_POST['y'];
//        $hash = $_POST['hash'];
//
//        //$hash = 5;//crc32($time);
//        $u1 = _mod2($hash / $s,  $q);
//        $u2 = _mod2($r / $s, $q);
//
//        $v1 = pow($g, $u1);
//        $v2 = pow($y, $u2);
//        //$v = ($v1 * $v2 % $p) % $q;
//        $v = _mod(_mod($v1*$v2, $p), $q);
//
//        if ($v == $r) {
//            $result = true;
//        } else {
//            $result = false;
//        }
//
//        return array('date_in' => $v1 . ' * ' . $v2 . ' % ' . $p . ' % ' . $q . ' = ' . $v, 'result' => $result);
//    }
//
//}
//
////  так как неправильно работает стандартная функция % для больших цифр
//function _mod($v1, $p)
//{
//    // надо округляться в меньшую сторону, но оно тоже тогда неправильно работает
//    if ($v1 > PHP_INT_MAX) {
//        return $v1 - round($v1 / $p) * $p;
//    } else {
//        return $v1 - floor($v1 / $p) * $p;
//    }
//}
//
//function _mod2($x,$y) {
//    if ($x>1) {
//        return $x % $y; //обычный mod
//    } else if ($x>0) {
//        $x=1/$x; //"переворачиваем" x
//        for ($i=0;$i<100;$i++) {
//            if (($x*$i) % $y == 1) { //мультипликативная инверсия
//                return $i;
//            }
//        }
//    }
//}
//
//function _prime () {
//    $array = array (3, 13);
//    return $array[rand(0, count($array)-1)];
//}