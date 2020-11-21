<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /* public function testExample()
    {
        $this->assertTrue(true);
    }  */

    // Fizz output on multiples of 3
    // Buzz output on multiples of 5
    // FizzBuzz output on multiples of 3 and 5
    // else output $number

    // (later) added "Rarr" into output on multiples of 7

    private $fizzbuzz;

    public function setUp() : void
    {
        parent::setUp();
        $this->fizzbuzz = new FizzBuzz();
    }

    public function test1()
    {
        $this->assertSame("1", $this->fizzbuzz->forNumber(1));
    }

    public function test2()
    {
        $this->assertSame("2", $this->fizzbuzz->forNumber(2));
    }

    public function test3()
    {
        $this->assertSame("Fizz", $this->fizzbuzz->forNumber(3));
    }

    public function test4()
    {
        $this->assertSame("4", $this->fizzbuzz->forNumber(4));
    }

    public function test5()
    {
        $this->assertSame("Buzz", $this->fizzbuzz->forNumber(5));
    }

    public function test6()
    {
        $this->assertSame("Fizz", $this->fizzbuzz->forNumber(6));
    }

    public function test7()
    {
        $this->assertSame("Rarr", $this->fizzbuzz->forNumber(7));
    }

    public function test10()
    {
        $this->assertSame("Buzz", $this->fizzbuzz->forNumber(10));
    }

    public function test15()
    {
        $this->assertSame("FizzBuzz", $this->fizzbuzz->forNumber(15));
    }

    // further test of "FizzBuzz" output
    public function test16()
    {
        $this->assertSame("FizzBuzz", $this->fizzbuzz->forNumber(30));
    }

    public function test17()
    {
        $this->assertSame("FizzBuzz", $this->fizzbuzz->forNumber(45));
    }

    public function test18()
    {
        $this->assertSame("FizzBuzz", $this->fizzbuzz->forNumber(60));
    }

    public function test19()
    {
        $this->assertSame("FizzBuzz", $this->fizzbuzz->forNumber(75));
    }

    public function test20()
    {
        $this->assertSame("FizzBuzz", $this->fizzbuzz->forNumber(90));
    }

    // further test of "Fizz" output
    public function test21()
    {
        $this->assertSame("FizzRarr", $this->fizzbuzz->forNumber(42));
    }

    public function test22()
    {
        $this->assertSame("Fizz", $this->fizzbuzz->forNumber(81));
    }

    public function test23()
    {
        $this->assertSame("Fizz", $this->fizzbuzz->forNumber(99));
    }

    public function test24()
    {
        $this->assertSame("Fizz", $this->fizzbuzz->forNumber(18));
    }

    // further test of "Buzz" output
    public function test25()
    {
        $this->assertSame("Buzz", $this->fizzbuzz->forNumber(65));
    }

    public function test26()
    {
        $this->assertSame("Buzz", $this->fizzbuzz->forNumber(80));
    }

    public function test27()
    {
        $this->assertSame("BuzzRarr", $this->fizzbuzz->forNumber(35));
    }
    
    public function test28()
    {
        $this->assertSame("Buzz", $this->fizzbuzz->forNumber(115));
    }

    public function test29()
    {
        $this->assertSame("FizzRarr", $this->fizzbuzz->forNumber(21));
    }

    public function test30()
    {
        $this->assertSame("BuzzRarr", $this->fizzbuzz->forNumber(35));
    }

    public function test31()
    {
        $this->assertSame("FizzBuzzRarr", $this->fizzbuzz->forNumber(105));
    }

    

}


