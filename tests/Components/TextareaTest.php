<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class TextareaTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function textarea_can_be_rendered()
    {
        $view = $this->blade('<x-textarea label="Test label" name="test_name"/>');

        $view->assertSee('Test label');
        $view->assertSee('<textarea', false);
        $view->assertSee('name="test_name"', false);
    }
}
