<div class="space-y-6">
    <!-- Header with event badge -->
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                @php
                    $eventColor = match($record->event) {
                        'created' => 'bg-green-100 text-green-800',
                        'updated' => 'bg-blue-100 text-blue-800',
                        'deleted' => 'bg-red-100 text-red-800',
                        'published' => 'bg-green-100 text-green-800',
                        'unpublished' => 'bg-yellow-100 text-yellow-800',
                        default => 'bg-gray-100 text-gray-800'
                    };
                    $eventLabel = match($record->event) {
                        'created' => 'შეიქმნა',
                        'updated' => 'განახლდა',
                        'deleted' => 'წაიშალა',
                        'published' => 'გამოქვეყნდა',
                        'unpublished' => 'გამოქვეყნება გაუქმდა',
                        default => ucfirst($record->event)
                    };
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $eventColor }}">
                    {{ $eventLabel }}
                </span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $record->model_name }}</h3>
                <p class="text-sm text-gray-500">{{ $record->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>
        <div class="text-right">
            <div class="text-sm text-gray-500">მომხმარებელი</div>
            <div class="font-medium text-gray-900">{{ $record->user_name ?? 'სისტემა' }}</div>
        </div>
    </div>

    <!-- Description -->
    @if($record->description)
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h4 class="text-sm font-medium text-blue-800">აღწერა</h4>
                <p class="mt-1 text-sm text-blue-700">{{ $record->description }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Additional Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @if($record->ip_address)
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <div>
                    <div class="text-sm font-medium text-gray-900">IP მისამართი</div>
                    <div class="text-sm text-gray-500 font-mono">{{ $record->ip_address }}</div>
                </div>
            </div>
        </div>
        @endif

        @if($record->changed_fields)
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                </svg>
                <div>
                    <div class="text-sm font-medium text-gray-900">შეცვლილი ველები</div>
                    <div class="text-sm text-gray-500">{{ count($record->changed_fields) }} ველი</div>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    @if($record->old_values && $record->new_values && $record->changed_fields)
    <div class="mt-6">
        <div class="flex items-center mb-4">
            <svg class="h-6 w-6 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">ცვლილებები</h3>
            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                {{ count($record->changed_fields) }} ველი
            </span>
        </div>
        
        <div class="space-y-4">
            @foreach($record->changed_fields as $field)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                        <div class="flex items-center">
                            <svg class="h-4 w-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $field }}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-0">
                        <div class="border-r border-gray-200">
                            <div class="bg-red-50 px-4 py-3 border-b border-red-200">
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span class="text-red-700 font-medium text-sm">ძველი მნიშვნელობა</span>
                                </div>
                            </div>
                            <div class="p-4">
                                @php
                                    $oldValue = $record->old_values[$field] ?? null;
                                    if (is_string($oldValue)) {
                                        $decoded = json_decode($oldValue, true);
                                        if (json_last_error() === JSON_ERROR_NONE) {
                                            $oldValue = $decoded;
                                        }
                                    }
                                @endphp
                                
                                @if(is_array($oldValue))
                                    @if(isset($oldValue['ka']) || isset($oldValue['en']))
                                        {{-- Translatable content --}}
                                        @if(isset($oldValue['ka']))
                                            <div class="mb-3">
                                                <div class="flex items-center mb-1">
                                                    <span class="text-xs font-medium text-red-600 bg-red-100 px-2 py-1 rounded">ქართული</span>
                                                </div>
                                                <div class="text-sm bg-white p-3 rounded border border-red-200 whitespace-pre-wrap text-red-800">{{ $oldValue['ka'] }}</div>
                                            </div>
                                        @endif
                                        @if(isset($oldValue['en']))
                                            <div class="mb-3">
                                                <div class="flex items-center mb-1">
                                                    <span class="text-xs font-medium text-red-600 bg-red-100 px-2 py-1 rounded">English</span>
                                                </div>
                                                <div class="text-sm bg-white p-3 rounded border border-red-200 whitespace-pre-wrap text-red-800">{{ $oldValue['en'] }}</div>
                                            </div>
                                        @endif
                                    @else
                                        {{-- Regular array --}}
                                        <div class="text-sm bg-white p-3 rounded border border-red-200 text-red-800">
                                            @foreach($oldValue as $key => $value)
                                                <div class="mb-1 last:mb-0">
                                                    <span class="font-medium text-red-700">{{ $key }}:</span> 
                                                    <span class="text-red-800">{{ is_string($value) ? $value : json_encode($value) }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @else
                                    <div class="text-sm bg-white p-3 rounded border border-red-200 whitespace-pre-wrap text-red-800">{{ $oldValue ?? 'არ არის მითითებული' }}</div>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-green-50 px-4 py-3 border-b border-green-200">
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-green-700 font-medium text-sm">ახალი მნიშვნელობა</span>
                                </div>
                            </div>
                            <div class="p-4">
                                @php
                                    $newValue = $record->new_values[$field] ?? null;
                                    if (is_string($newValue)) {
                                        $decoded = json_decode($newValue, true);
                                        if (json_last_error() === JSON_ERROR_NONE) {
                                            $newValue = $decoded;
                                        }
                                    }
                                @endphp
                                
                                @if(is_array($newValue))
                                    @if(isset($newValue['ka']) || isset($newValue['en']))
                                        {{-- Translatable content --}}
                                        @if(isset($newValue['ka']))
                                            <div class="mb-3">
                                                <div class="flex items-center mb-1">
                                                    <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded">ქართული</span>
                                                </div>
                                                <div class="text-sm bg-white p-3 rounded border border-green-200 whitespace-pre-wrap text-green-800">{{ $newValue['ka'] }}</div>
                                            </div>
                                        @endif
                                        @if(isset($newValue['en']))
                                            <div class="mb-3">
                                                <div class="flex items-center mb-1">
                                                    <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded">English</span>
                                                </div>
                                                <div class="text-sm bg-white p-3 rounded border border-green-200 whitespace-pre-wrap text-green-800">{{ $newValue['en'] }}</div>
                                            </div>
                                        @endif
                                    @else
                                        {{-- Regular array --}}
                                        <div class="text-sm bg-white p-3 rounded border border-green-200 text-green-800">
                                            @foreach($newValue as $key => $value)
                                                <div class="mb-1 last:mb-0">
                                                    <span class="font-medium text-green-700">{{ $key }}:</span> 
                                                    <span class="text-green-800">{{ is_string($value) ? $value : json_encode($value) }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @else
                                    <div class="text-sm bg-white p-3 rounded border border-green-200 whitespace-pre-wrap text-green-800">{{ $newValue ?? 'არ არის მითითებული' }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div> 