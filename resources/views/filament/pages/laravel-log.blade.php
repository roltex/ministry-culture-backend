<x-filament::page>
    <div>
        <div class="mb-4">
            <button x-data="{ tab: 'laravel' }" @click="tab = 'laravel'" :class="tab === 'laravel' ? 'bg-primary text-white' : 'bg-gray-200'" class="px-4 py-2 rounded-l">Laravel Log</button>
            <button x-data="{ tab: 'filament' }" @click="tab = 'filament'" :class="tab === 'filament' ? 'bg-primary text-white' : 'bg-gray-200'" class="px-4 py-2 rounded-r">Filament Log</button>
        </div>
        <div x-data="{ tab: 'laravel' }">
            <div x-show="tab === 'laravel'">
                <h2 class="text-lg font-bold mb-4">Last 100 lines of Laravel Log</h2>
                <pre class="bg-gray-900 text-green-200 p-4 rounded overflow-x-auto" style="max-height: 600px;">{{ $this->laravelLogContent }}</pre>
            </div>
            <div x-show="tab === 'filament'">
                <h2 class="text-lg font-bold mb-4">Last 100 lines of Filament Log</h2>
                <pre class="bg-gray-900 text-blue-200 p-4 rounded overflow-x-auto" style="max-height: 600px;">{{ $this->filamentLogContent }}</pre>
            </div>
        </div>
    </div>
</x-filament::page> 