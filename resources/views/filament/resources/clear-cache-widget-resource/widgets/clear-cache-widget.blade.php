<x-filament::card>
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <span class="text-sm font-semibold text-white">
                Clear All Cache
            </span>

            <x-filament::button wire:click="clearCache" color="warning">
                Clear Now
            </x-filament::button>
        </div>
    </div>
</x-filament::card>
