<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class RadioTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function radio_can_be_rendered()
    {
        $view = $this->withViewErrors([])
            ->blade('<x-radio label="Test label" name="test_name"/>');

        $view->assertSee('Test label');
        $view->assertSee('type="radio"', false);
        $view->assertSee('name="test_name"', false);
    }
}
