<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class CheckboxTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function checkbox_can_be_rendered()
    {
        $view = $this->blade('<x-checkbox label="Test label" name="test_name"/>');

        $view->assertSee('Test label');
        $view->assertSee('type="checkbox"', false);
        $view->assertSee('name="test_name"', false);
    }
}
