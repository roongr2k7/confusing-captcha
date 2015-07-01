<?php
require_once "Captcha.php";
class CaptchaTest extends PHPUnit_Framework_TestCase {
        function testLeftOperandShouldBeThree(){
                $captcha = new Captcha(1, 3, 1, 1);
                $leftOperand = $captcha->getLeftOperand();
                $this->assertEquals("Three", $leftOperand->toString());

        }       
        function testResultOperatorShouldBeMinus() {
                $captcha = new Captcha(1, 1, 3, 1);
                $operator = $captcha->getOperator();
                $this->assertEquals("-", $operator->toString());
        }

        function testResultOperatorShouldBePlus() {
                $captcha = new Captcha(1, 1, 1, 1);
                $operator = $captcha->getOperator();
                $this->assertEquals("+", $operator->toString());
        }

        function testRightOperandShouldBe5(){
                $captcha = new Captcha(1, 1, 1, 5);
                $rightOperand = $captcha->getRightOperand();
                $this->assertEquals("5", $rightOperand->toString());
        }

        function testLeftOperandShouldBe1(){
                $captcha = new Captcha(2, 1, 1, 1);
                $leftOperand = $captcha->getLeftOperand();
                $this->assertEquals("1", $leftOperand->toString());

        }

        function testRightOperandShouldBeOne() {
                $captcha = new Captcha(2, 1, 1, 1);
                $rightOperand = $captcha->getRightOperand();
                $this->assertEquals("One", $rightOperand->toString());
        }
        function testResultCaptchaWhenLeftOperandIsString() {
                $captcha = new Captcha(1, 1, 3, 2);
                $result = $captcha->toString();
                $this->assertEquals("One - 2",$result);
        }
        function testResultCaptchaWhenLeftOperandIsInteger() {
                $captcha = new Captcha(2, 1, 2, 1);
                $result = $captcha->toString();
                $this->assertEquals("1 * One",$result);
        }
        function testExceptionCaptchaWhenLeftOperandIsZero() {
                try {
                        $captcha = new Captcha(2, 0, 1, 1);
                        $this->fail("Invalid Range Operand");
                } catch (InvalidRangeException $e) {
                        
                }

        }
}
