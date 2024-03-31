<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class InputErrorTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function input_error_can_be_rendered()
    {
        $view = $this->withViewErrors([])
            ->blade('<x-input-error>Some error</x-input-error>');


        $view->assertSee('<div class="input-error"', false);
    }
}
