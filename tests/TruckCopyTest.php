<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class TruckCopyTest extends TestCase
{
    public static function callProtectedMethod($object, $method, array $args=array()) {
        $class = new \ReflectionClass(get_class($object));
        $method = $class->getMethod($method);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $args);
    }

    public function testTextIsSet(): void
    {
        $truck_copy = $this->getMockForAbstractClass('App\TruckCopy');
        self::callProtectedMethod($truck_copy, "getText");

        $truck_copy->getTruckHtml('#CCE70B', 'Hello, Ecommerce.');
        $this->assertEquals("Hello, Ecommerce.", $truck_copy->getText());

        $truck_copy->getTruckHtml('#CCE70B', 'Hello, Ecommerce.');
        $this->assertNotEquals("Something else.", $truck_copy->getText());
    }
}