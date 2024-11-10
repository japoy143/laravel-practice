<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>


    @foreach ($jobs as $job)
        <li class=" list-none">
            <a href="{{ route('jobs.details', $job['id']) }}">
                <strong>{{ $job['title'] }}</strong>
            </a>
        </li>
    @endforeach

</x-layout>
