<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#5C4033] leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-[#5C4033] mb-4 border-b border-stone-200 pb-2">
                            {{ __('Your Account Balance') }}
                        </h4>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-stone-100 text-[#5C4033]">
                                        <th class="px-4 py-3 font-semibold border-b border-stone-200">Description</th>
                                        <th class="px-4 py-3 font-semibold border-b border-stone-200">Amount Due</th>
                                        <th class="px-4 py-3 font-semibold border-b border-stone-200">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(Auth::user()->studentFees ?? [] as $bill)
                                        <tr class="border-b border-stone-100 hover:bg-stone-50 transition">
                                            <td class="px-4 py-4 text-stone-700">
                                                {{ $bill->feeDefinition->fee_type }}
                                            </td>
                                            <td class="px-4 py-4 font-mono text-stone-800">
                                                ₱{{ number_format($bill->balance, 2) }}
                                            </td>
                                            <td class="px-4 py-4">
                                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $bill->status == 'paid' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                    {{ strtoupper($bill->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-8 text-center text-stone-400 italic">
                                                {{ __('No fees have been assigned to your account yet.') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>