<?php
/*from now, the way we get the entity is not really optimized. it works now 
  but after we must optimize it
*/
class Base62 {

    public function __construct() {

        $this->digits = array();
        for ($i=0; $i<10; ++$i) $this->digits[$i] = $i;
        $this->digits[] = 'a'; $this->digits[] = 'b'; $this->digits[] = 'c'; $this->digits[] = 'd'; $this->digits[] = 'e';
        $this->digits[] = 'f'; $this->digits[] = 'g'; $this->digits[] = 'h'; $this->digits[] = 'i'; $this->digits[] = 'j';
        $this->digits[] = 'k'; $this->digits[] = 'l'; $this->digits[] = 'm'; $this->digits[] = 'n'; $this->digits[] = 'o';
        $this->digits[] = 'p'; $this->digits[] = 'q'; $this->digits[] = 'r'; $this->digits[] = 's'; $this->digits[] = 't';
        $this->digits[] = 'u'; $this->digits[] = 'v'; $this->digits[] = 'w'; $this->digits[] = 'x'; $this->digits[] = 'y';
        $this->digits[] = 'z';

        $this->digits[] = 'A'; $this->digits[] = 'B'; $this->digits[] = 'C'; $this->digits[] = 'D'; $this->digits[] = 'E';
        $this->digits[] = 'F'; $this->digits[] = 'G'; $this->digits[] = 'H'; $this->digits[] = 'I'; $this->digits[] = 'J';
        $this->digits[] = 'K'; $this->digits[] = 'L'; $this->digits[] = 'M'; $this->digits[] = 'N'; $this->digits[] = 'O';
        $this->digits[] = 'p'; $this->digits[] = 'Q'; $this->digits[] = 'R'; $this->digits[] = 'S'; $this->digits[] = 'T';
        $this->digits[] = 'U'; $this->digits[] = 'V'; $this->digits[] = 'W'; $this->digits[] = 'X'; $this->digits[] = 'Y';
        $this->digits[] = 'Z';
    }

    public function digit($num, $b = 62) {
        if ($num >= $b || $num > count($this->digits)-1) return null;

        return $this->digits[$num];
    }

    public function digit2num($digit) {
        if (ord('0') <= ord($digit) && ord($digit) <= ord('9')) return ord($digit) - ord('0');
        if (ord('a') <= ord($digit) && ord($digit) <= ord('z')) return 10 + ord($digit) - ord('a');
        if (ord('A') <= ord($digit) && ord($digit) <= ord('Z')) return 36 + ord($digit) - ord('A');
        return null;
    }

    public function _10_2_b($num, $length = 7, $b = 62){
        $rep = array();
        $i = 0;
        do {
            $q = (int) ($num / $b);
            $r = $num % $b;
            $rep[] = $this->digit($r, $b);
            $num = $q;
        }while(++$i <= $length && $num > 0);
        for ($i = count($rep); $i<$length; ++$i) $rep[] = 0;
        $rep = array_reverse($rep);
        return implode('', $rep);
    }

    public function _b_2_10($num, $b = 62) {
        $rep = 0;
        for ($i=0, $max = strlen($num); $i<$max; ++$i) {
            $rep += (int)$this->digit2num($num[$i])*pow($b, $max-$i-1);
            //echo ' rep'.$i.' = '.$rep.'  ';
        }
        return $rep;
    }
}

/*
$test = new Base62();
echo '000gR = '.$test->_b_2_10('ng').' and ';
echo '1045 = '.$test->_10_2_b(1442).' ';
*/



