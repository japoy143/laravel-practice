<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>


    <div class="space-y-4">

        @foreach ($jobs as $job)
            <a href="{{ route('jobs.show', $job->id) }}" class=" block p-6 border border-gray-800">
                <div class=" text-blue-400 text-sm font-semibold">{{ $job->employer->name }}</div>

                <h1>{{ $job->title }}</h1>


            </a>
        @endforeach


        <div>{{ $jobs->links() }}</div>
    </div>

</x-layout>
