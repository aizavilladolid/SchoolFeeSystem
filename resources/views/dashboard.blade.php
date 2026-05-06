<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#5C4033] leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Content Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-[#71797E]">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-[#5C4033] mb-4">
                        Welcome back, {{ Auth::user()->name }}!
                    </h3>
                    
                    <div class="bg-stone-50 p-4 rounded-lg border border-stone-200">
                        <p class="text-[#5C4033] flex items-center">
                            <span class="font-semibold mr-2">{{ __('Student ID:') }}</span>
                            <span class="text-lg text-red-500">{{ Auth::user()->student_id ?? 'DATA IS MISSING' }}</span>
                        </p>
                        <p class="text-sm text-stone-500 mt-1">
                            {{ __("You are currently logged into the School Fee System.") }}
                        </p>
                    </div>

                    <!-- Placeholder for future Fee Summary Table -->
                    <div class="mt-8">
                        <p class="text-stone-400 italic text-sm">
                            Fee collection reports and payment history will appear here.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>