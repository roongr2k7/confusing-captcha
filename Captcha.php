<?php
class Captcha {
  static $_e = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
  static $_f = ['', '+', '*', '-'];

  function Captcha() {
    foreach (func_get_args() as $a => $b) $this->{'_' . $a} = $b;
    if (min($this->_1, $this->_3) < 1 || max($this->_1, $this->_3) > 9) throw new InvalidRangeException();
    $this->_ = ['l1' => self::$_e, 'r2' => self::$_e, 'o' => self::$_f];
  }

  function __call($a, $b) {
    $a = strtolower($a)[3] ?: $a;
    $b = $a === 'l' ? $this->_1 : ($a === 'o' ? $this->_2 : $this->_3);
    return new o($a === 'o' ? $this->_[$a][$b] : $this->_[$a . $this->_0][$b] ?: $this->_3);
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

