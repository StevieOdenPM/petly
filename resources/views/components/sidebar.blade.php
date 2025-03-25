<div class="w-16 bg-white flex flex-col items-center py-4 shadow-md">
    <div class="mb-6">
        <a href="{{ route('courier.profile') }}">
            <img src="{{ asset('images/petlyLogo.png') }}" alt="Petty Logo" class="w-8 h-8">
        </a>
    </div>
    <div class="flex flex-col items-center gap-6">
        <!-- Profile Button -->
        <button onclick="window.location.href='{{ route('courier.profile') }}'"
            class="p-2 rounded-lg transition-colors {{ Route::currentRouteName() == 'courier.profile' ? 'bg-gray-200 text-black' : 'hover:bg-gray-100' }}">
            <i class="ri-user-line text-lg {{ Route::currentRouteName() == 'courier.profile' ? 'text-black' : 'text-gray-400' }}"></i>
        </button>

        <!-- Parcel Tracking Button -->
        <button onclick="window.location.href='{{ route('parcel.tracking') }}'"
            class="p-2 rounded-lg transition-colors {{ Route::currentRouteName() == 'parcel.tracking' ? 'bg-gray-200 text-black' : 'hover:bg-gray-100' }}">
            <i class="ri-truck-line text-lg {{ Route::currentRouteName() == 'parcel.tracking' ? 'text-black' : 'text-gray-400' }}"></i>
        </button>
    </div>
</div>
