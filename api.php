<?php
<<<<<<< HEAD

switch ($_GET['func']) {
    case 'genkeys':
    case 'auth':
        $_GET['func']();
        break;
    default:
}

function genkeys()
{
    $cl = new DSA();
    $array = $cl->init();
    //$array = array('g' => 0, 'p' => 1, 'q' => 2, 'x' => 3, 'y' => 4, 'r' => 5, 's' => 6);
    echo json_encode($array);
}

function auth()
{
    $cl = new DSA();
    $array = $cl->ver();
    echo json_encode($array);
}

Class DSA
{
    // параметры
    private $dsa_L = 1024; // размерность числа p
    private $dsa_N = 160; // размерность хэш-функци, числа q
    private $dsa_q; // простое число размерностью N
    private $dsa_p; // простое число размерностью L, такое, что (p-1) делится на q,
    private $dsa_g; // g=h^[(p-1)/q], где h = (1, p-1) и g<>1, например h=2

    // ключи
    private $dsa_x; // секретный ключ, x = (0; q)
    private $dsa_y; // открытый ключ, y = ( g^x ) mod p

    public function init()
    {
        $q = 13;
        $p = 13 * 4 + 1;
        $g = pow(2, ($p - 1) / $q);

        $x = 3;//rand(1, $q - 1);
        $y = 15;//pow($g, $x) % $p;

        // генерация подписи
        $k = 2;
        $r = (pow($g, $k) % $p) % $q;

        $hash = 5;//crc32(time());
        $s = (1 / $k) * ($hash + $x * $r) % $q;

        return array('g' => $g, 'p' => $p, 'q' => $q, 'x' => $x, 'y' => $y, 'r' => $r, 's' => $s);
    }

    public function ver()
    {
        $r = $_POST['r'];
        $s = $_POST['s'];
        $q = $_POST['q'];
        $g = $_POST['g'];
        $p = $_POST['p'];
        $y = $_POST['y'];

        $w = (1 / $s);
        $time = time();
        $hash = 5;//crc32($time);
        $u1 = 7;//($hash / $s) % $q;
        $u2 = 7;//($r / $s) % $q;
        $v1 = pow($g, $u1);
        $v2 = pow($y, $u2);
        //$v = ($v1 * $v2 % $p) % $q;
        $v = _mod(_mod($v1*$v2, $p), $q);

        if ($v == $r) {
            $result = true;
        } else {
            $result = false;
        }

        return array('date_in' => $v1 . ' * ' . $v2 . ' % ' . $p . ' % ' . $q . ' = ' . $v, 'result' => $result);
    }

}

//  так как неправильно работает стандартная функция % для больших цифр
function _mod($v1, $p)
{
    // надо округляться в меньшую сторону, но оно тоже тогда неправильно работает
    return $v1 - round($v1 / $p) * $p;
}

=======
echo 'Привет?!';
?>
>>>>>>> 1b0432f920d78b638e85ffb498e0eed680426011
