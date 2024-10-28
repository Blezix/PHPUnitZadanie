<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../src/index.php';

class indexTest extends TestCase
{
    public function testValidRedirect()
    {
        $redirect = new PageRedirect('wi', 3, '1tp');
        $this->assertEquals('https://edu.gplweb.pl/?svc=courses&id=wi&lesson=3&class=1tp', $redirect->getRedirectUrl());
    }

    public function testInvalidId()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid lesson for subject invalid_id");

        $redirect = new PageRedirect('invalid_id', 3, '1tp');
        $redirect->getRedirectUrl();
    }

    public function testInvalidClass()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid class for subject wi");

        $redirect = new PageRedirect('wi', 3, 'invalid_class');
        $redirect->getRedirectUrl();
    }

    public function testInvalidLesson()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid lesson for subject wi");

        $redirect = new PageRedirect('wi', 10, '1tp');
        $redirect->getRedirectUrl();
    }
}