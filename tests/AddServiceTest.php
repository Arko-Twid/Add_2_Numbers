<?php

use App\AddService;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/AddService.php';
class AddServiceTest extends TestCase
{
    public function testAddTwoPositiveNumber()
    {
        $addObject = new AddService();
        $firstNum=rand(1,1000);
        $secondNum=rand(1,1000);
        $result = $addObject->add($firstNum, $secondNum);
        $this->assertEquals($firstNum+$secondNum, $result);
    }
    public function testAddTwoNegativeNumber()
    {
        $addObject = new AddService();
        $firstNum=rand(-1,-1000);
        $secondNum=rand(-1,-1000);
        $result = $addObject->add($firstNum, $secondNum);
        $this->assertEquals($firstNum+$secondNum, $result);
    }

    public function testAddTwoNumber()
    {
        $addObject = new AddService();
        $firstNum=rand(-1000,1000);
        $secondNum=rand(-1000,1000);
        $result = $addObject->add($firstNum, $secondNum);
        $this->assertEquals($firstNum+$secondNum, $result);
    }

    public function testAddTwoFloatNumber()
    {
        $addObject = new AddService();
        $firstNum = mt_rand() / mt_getrandmax() * 100;
        $secondNum = mt_rand() / mt_getrandmax() * 100;
        $this->assertEquals($firstNum+$secondNum, $addObject->add($firstNum, $secondNum));
    }
    public function testAddTwoString()
    {
        $this->expectException(InvalidArgumentException::class);
        $addObject = new AddService();
        $addObject->add('Hello', 'Boss');
    }
    public function testAddOneString()
    {
        $this->expectException(InvalidArgumentException::class);
        $addObject = new AddService();
        $addObject->add('Hello', 3);
    }

    public function testAddTwoSymbols()
    {
        $this->expectException(InvalidArgumentException::class);
        $addObject = new AddService();
        $addObject->add('', '');
    }
    public function testAddNanType()
    {
        $addObject = new AddService();
        $this->assertNan($addObject->add(NAN, NAN));
        $this->assertNan($addObject->add(NAN, 1));
        $this->assertNan($addObject->add(1, NAN));
    }

    public function testAddInfTyoe()
    {
        $addObject = new AddService();
        $this->assertInfinite($addObject->add(INF, INF));
        $this->assertInfinite($addObject->add(INF, 1));
        $this->assertNan($addObject->add(INF, -INF));
    }
    public function testOverflowAndUnderflow()
    {
        $addObject = new AddService();
        $this->assertIsFloat($addObject->add(PHP_INT_MAX, 1));
        $this->assertIsInt($addObject->add(PHP_INT_MAX, -PHP_INT_MAX));
        $this->assertIsFloat($addObject->add(-PHP_INT_MAX, -PHP_INT_MAX));

        $this->assertIsFloat($addObject->add(PHP_FLOAT_MAX, 1));
        $this->assertEquals(INF,($addObject->add(PHP_FLOAT_MAX, PHP_FLOAT_MAX)));
        $this->assertIsFloat($addObject->add(PHP_FLOAT_MAX, -PHP_FLOAT_MAX));

        $this->assertEquals(-INF,($addObject->add(-PHP_FLOAT_MAX, -PHP_FLOAT_MAX)));

    }

}