<?php

use Livewire\Volt\Volt;

beforeEach(function () {
    $this->counterComponent = Volt::test('counter');
    $this->counterComponent->set('count', 0);
});

it('can render', function () {
    $this->counterComponent
        ->assertSee('0');
});


describe('Actions', function () {
    it('can increment', function () {

        $this->counterComponent
            ->call('increment')
            ->assertSee('1');
    });

    it('can decrement', function() {
        $this->counterComponent
            ->call('decrement')
            ->assertSee('-1');
    });
//
    it('can increment after decrementing', function() {
        $this->counterComponent
            ->call('decrement')
            ->assertSee('-1')
            ->call('increment')
            ->assertSee('0');
    });

    it('can decrement after incrementing', function() {
        $this->counterComponent
            ->call('increment')
            ->assertSee('1')
            ->call('decrement')
            ->assertSee('0');
    });
});