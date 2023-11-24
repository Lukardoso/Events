<?php

namespace Tests\Unit;

use Tests\TestCase;


class EventControllerTest extends TestCase
{
    public function test_default_picture_exists(): void
    {
        $file = 'public/images/default_picture.png';
        $this->assertFileExists($file);
    }
}
