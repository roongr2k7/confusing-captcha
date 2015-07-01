<?php
class Captcha {
  static $_e = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
  static $_f = ['', '+', '*', '-'];
  function __construct($a, $b, $c, $d) {
    if (min($b, $d) < 1 || max($b, $d) > 9) throw new InvalidRangeException();
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
    $this->d = $d;
  }

  function __get($a) {
    return ['l1' => self::$_e, 'r2' => self::$_e, 'o' => self::$_f];
  }

  function __call($a, $b) {
    $c = strlen($a) < 3 ?  $a[0] : strtolower($a)[3];
    $b = $c === 'l' ? $this->b : ($c === 'o' ? $this->c : $this->d);
    $c =  $c === 'o' ? $c : $c . $this->a;
    $c = $this->_[$c][$b];
    $c = $c ?: $b;
    return strlen($a) < 3 ? $c : new o($c);
  }

  function toString() {
    return implode(' ', [$this->l(), $this->o(), $this->r()]);
  }
}

class o {
  function __construct($a) {
    $this->a = $a;
  }

  function toString() {
    return $this->a;
  }
}

class InvalidRangeException extends Exception {
}

