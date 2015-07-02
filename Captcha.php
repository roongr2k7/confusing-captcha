<?php
class Captcha {
  static $_e = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
  static $_f = ['', '+', '*', '-'];
  function Captcha() {
    foreach (func_get_args() as $a => $b) {
      $this->{'a' . $a} = $b;
    }
    if (min($this->a1, $this->a3) < 1 || max($this->a1, $this->a3) > 9) throw new InvalidRangeException();
  }

  function __get($a) {
    return ['l1' => self::$_e, 'r2' => self::$_e, 'o' => self::$_f];
  }

  function __call($a, $b) {
    $a = strtolower($a)[3] ?: $a;
    $b = $a === 'l' ? $this->a1 : ($a === 'o' ? $this->a2 : $this->a3);
    return new o($a === 'o' ? $this->_[$a][$b] : $this->_[$a . $this->a0][$b] ?: $this->a3);
  }

  function toString() {
    return implode(' ', [$this->l(), $this->o(), $this->r()]);
  }
}

class o {
  function __construct($a) {
    $this->a = $a;
  }

  function __toString() {
    return (string)$this->a;
  }

  function toString() {
    return $this->a;
  }
}

class InvalidRangeException extends Exception {
}

