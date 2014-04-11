function _mod($x,$y) {
  if ($x>1) {
    return $x % $y; //обычный mod
  } else if ($x>0) {
    $x=1/$x; //"переворачиваем" x
    for ($i=0;$i<100;$i++) {
      if (($x*$i) % $y == 1) { //мультипликативная инверсия
        return $i;
      }
    }
  }
}
