<?php

use App\Models\User;
use function Livewire\Volt\{state};
use function Livewire\Volt\{on};

state(['count' => 0])

on(['count-updated' => function () {
    $this->count++;
}])

$incrementCount = fn () => $this->dispatch('count-updated');

$decrementCount = fn () => $this->count--;

?>

<div>
    {{-- The whole world belongs to you. --}}
    <h1 class="text-xl font-semibold mt-6 text-gray-900 dark:text-white">{{$count}}</h1>

    <button class="text-gray-900 dark:text-white" wire:click="increment">+</button>
    <button class="text-gray-900 dark:text-white" wire:click="decrement">-</button>
</div>
