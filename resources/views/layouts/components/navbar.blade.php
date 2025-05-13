<nav class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-gray-700">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-900">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
