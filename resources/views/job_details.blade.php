<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>


    <h2>{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }}
    </p>

</x-layout>
