<x-filament::widget>
    <x-filament::card>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                {{-- Badge Status dengan ikon --}}
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                    {{ $enabled ? 'bg-green-600 text-white' : 'bg-red-600 text-white' }}">
                    
                    @if ($enabled)
                        <x-heroicon-o-check-circle class="w-4 h-4 mr-1 text-white" />&nbsp;
                        ON (Aktif)
                    @else
                        <x-heroicon-o-x-circle class="w-4 h-4 mr-1 text-white" />&nbsp;
                        OFF (Nonaktif)
                    @endif
                </span>

                {{-- Tombol Toggle --}}
                <form wire:submit.prevent="toggleMaintenance">
                    <x-filament::button 
                        type="submit" 
                        color="{{ $enabled ? 'danger' : 'success' }}">
                        {{ $enabled ? 'Nonaktifkan Maintenance' : 'Aktifkan Maintenance' }}
                    </x-filament::button>
                </form>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
