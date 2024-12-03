<x-layout>
    <x-slot:heading>
        Register Page
    </x-slot:heading>


    <form method="POST" action="{{ route('register.save') }}">
        {{-- Crossite Site Request Forgery --}}
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">


                <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">Firstname</x-form-label>
                        <x-form-input name="first_name" id="first_name" placeholder="first_name" required />
                        <x-form-error name="first_name" />
                    </x-form-field>



                    <x-form-field>
                        <x-form-label for="last_name">Lastname</x-form-label>
                        <x-form-input name="last_name" id="last_name" placeholder="last_name" required />
                        <x-form-error name="last_name" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" placeholder="email" required />
                        <x-form-error name="email" />
                    </x-form-field>



                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" placeholder="password" required />
                        <x-form-error name="password" />
                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <x-form-input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="confirm password" required />
                        <x-form-error name="password_confirmation" />
                    </x-form-field>
                </div>




            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <x-form-button>Save</x-form-button>
            </div>
    </form>


</x-layout>
