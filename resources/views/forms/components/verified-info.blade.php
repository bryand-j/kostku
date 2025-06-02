<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <!-- Interact with the `state` property in Alpine.js -->

        <div class="flex items-center gap-2">
            @if ($getState())
                <x-filament::badge color="success" icon="heroicon-o-check-circle">
                    Verified
                </x-filament::badge>
            @else
                <x-filament::badge color="danger" icon="heroicon-o-x-circle">
                    Your Account Not Verified
                </x-filament::badge>
            @endif
        </div>
    </div>
</x-dynamic-component>
