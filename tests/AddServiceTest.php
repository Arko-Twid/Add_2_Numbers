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
}