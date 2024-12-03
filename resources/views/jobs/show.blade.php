<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>


    <h2>{{ $job->title }}</h2>
    <p>
        This job pays {{ $job->salary }}
    </p>

    <div class="mt-2 w-[250px] flex flex-row justify-between  ">
        @can('edit-job')
            <x-button href="{{ route('jobs.edit', $job->id) }}">Update</x-button>
        @endcan

        <button class="p-2 bg-red-500 rounded-md" form="delete">Delete</button>
    </div>

    <form method="POST" id="delete" action="{{ route('jobs.destroy', $job->id) }}">
        @csrf
        @method('DELETE')

    </form>

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

</x-layout>
