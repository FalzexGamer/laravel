<x-layout>
    <x-slot:heading>job</x-slot:heading>
    <h2 class="text-xl font-bold">{{ $job['title'] }}</h2>
    <p class="mb-4 text-gray-600">{{ $job['salary'] }}</p>
</x-layout>
