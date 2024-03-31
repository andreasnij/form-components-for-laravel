<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class InputTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function input_can_be_rendered()
    {
        $view = $this->withViewErrors([])
            ->blade('<x-input label="Test label" name="test_name"/>');

        $view->assertSee('Test label');
        $view->assertSee('<input', false);
        $view->assertSee('name="test_name"', false);
    }
}
