<x-layout>
    <x-slot:heading>job listing</x-slot:heading>
    @foreach ($jobs as $job)
        <a href="jobs/{{ $job['id'] }}">
            <h2 class="text-xl font-bold">{{ $job['title'] }}</h2>
            <p class="mb-4 text-gray-600">{{ $job['salary'] }}</p>
        </a>
    @endforeach
</x-layout>
