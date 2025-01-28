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
}