<x-layout>
    <x-slot:heading>job listing</x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="jobs/{{ $job['id'] }}"
                class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="text-xl font-bold">{{ $job->employer->name }}</h2>
                <p class="mb-4 text-gray-600">{{ $job['title'] }} - RM {{ $job['salary'] }}</p>
            </a>
        @endforeach
    </div>
</x-layout>
