<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class FormTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function form_can_be_rendered()
    {
        $view = $this->blade('<x-form />');

        $view->assertSee('<form method="POST"', false);
    }
}
