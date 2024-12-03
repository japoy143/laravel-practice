<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>


    <form method="POST" action="{{ route('login.request') }}">
        {{-- Crossite Site Request Forgery --}}
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">


                <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" placeholder="email" :value="old('email')"
                            required />
                        <x-form-error name="email" />
                    </x-form-field>



                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" placeholder="password" required />
                        <x-form-error name="password" />
                    </x-form-field>


                </div>



            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <x-form-button>Save</x-form-button>
            </div>
    </form>


</x-layout>
