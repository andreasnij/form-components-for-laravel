<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class SelectTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function select_can_be_rendered()
    {
        $view = $this->blade('<x-select label="Test label" name="test_name"/>');

        $view->assertSee('Test label');
        $view->assertSee('<select', false);
        $view->assertSee('name="test_name"', false);
    }
}
