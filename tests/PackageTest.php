<?php

declare(strict_types=1);

use Prajwal89\ShareTo;
use PHPUnit\Framework\TestCase;

class PackageTest extends TestCase
{
    public function testInstantiationOfMyPackage()
    {
        $obj = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
        $this->assertInstanceOf('\Prajwal89\ShareTo', $obj);
    }
}
