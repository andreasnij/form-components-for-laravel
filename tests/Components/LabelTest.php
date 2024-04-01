<?php

namespace FormComponentsForLaravel\Tests\Components;

use FormComponentsForLaravel\Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use PHPUnit\Framework\Attributes\Test;

class LabelTest extends TestCase
{
    use InteractsWithViews;

    #[Test]
    public function label_can_be_rendered()
    {
        $view = $this->blade('<x-label for="test-id">Test label</x-label>');

        $view->assertSee('<label for="test-id" class="label">Test label</label>', false);
    }
}
