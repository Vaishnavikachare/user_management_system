<x-guest-layout>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Date of birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="block mt-1 w-full">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <select id="country" name="country" class="block mt-1 w-full">
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-input-label for="state" :value="__('State')" />
            <select id="state" name="state" class="block mt-1 w-full">
                @foreach($states as $state)
                    <!-- <option value="{{ $state->id }}">{{ $state->name }}</option> -->
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <select id="city" name="city" class="block mt-1 w-full">
                @foreach($cities as $city)
                    <!-- <option value="{{ $city->id }}">{{ $city->name }}</option> -->
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var countryId = $(this).val();

                // Make an AJAX request to fetch states for the selected country
                $.ajax({
                    url: '/get-states/' + countryId, // Adjust the route URL as needed
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options in the state dropdown
                        $('#state').empty();

                        // Add new options based on the received data
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log('Error fetching states: ' + JSON.stringify(error));
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#state').change(function() {
                var stateId = $(this).val();

                // Make an AJAX request to fetch cities for the selected state
                $.ajax({
                    url: '/get-cities/' + stateId, // Adjust the route URL as needed
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options in the city dropdown
                        $('#city').empty();

                        // Add new options based on the received data
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log('Error fetching cities: ' + JSON.stringify(error));
                    }
                });
            });
        });
    </script>

</x-guest-layout>
