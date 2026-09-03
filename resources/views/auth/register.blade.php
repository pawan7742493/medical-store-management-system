<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <div>

            <x-input-label
                for="customer_type"
                :value="__('Customer Type')"
            />

            <select
                id="customer_type"
                name="customer_type"
                class="block mt-1 w-full border-gray-300 rounded-md"
                required
            >

                <option value="">Select Customer Type</option>

                <option value="medical_store"
                    {{ old('customer_type') == 'medical_store' ? 'selected' : '' }}>
                    Medical Store
                </option>

                <option value="hospital"
                    {{ old('customer_type') == 'hospital' ? 'selected' : '' }}>
                    Hospital
                </option>

                <option value="clinic"
                    {{ old('customer_type') == 'clinic' ? 'selected' : '' }}>
                    Clinic
                </option>

            </select>

            <x-input-error
                :messages="$errors->get('customer_type')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="customer_name"
                :value="__('Contact Name')"
            />

            <x-text-input
                id="customer_name"
                class="block mt-1 w-full"
                type="text"
                name="customer_name"
                :value="old('customer_name')"
                required
                autofocus
            />

            <x-input-error
                :messages="$errors->get('customer_name')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="shop_name"
                :value="__('Shop / Hospital / Clinic Name')"
            />

            <x-text-input
                id="shop_name"
                class="block mt-1 w-full"
                type="text"
                name="shop_name"
                :value="old('shop_name')"
                required
            />

            <x-input-error
                :messages="$errors->get('shop_name')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="mobile"
                :value="__('Mobile Number')"
            />

            <x-text-input
                id="mobile"
                class="block mt-1 w-full"
                type="text"
                name="mobile"
                :value="old('mobile')"
                required
            />

            <x-input-error
                :messages="$errors->get('mobile')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="address"
                :value="__('Address')"
            />

            <textarea
                id="address"
                name="address"
                rows="3"
                class="block mt-1 w-full border-gray-300 rounded-md"
                required
            >{{ old('address') }}</textarea>

            <x-input-error
                :messages="$errors->get('address')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="city"
                :value="__('City')"
            />

            <x-text-input
                id="city"
                class="block mt-1 w-full"
                type="text"
                name="city"
                :value="old('city')"
                required
            />

            <x-input-error
                :messages="$errors->get('city')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="gst_number"
                :value="__('GST Number')"
            />

            <x-text-input
                id="gst_number"
                class="block mt-1 w-full"
                type="text"
                name="gst_number"
                :value="old('gst_number')"
            />

            <x-input-error
                :messages="$errors->get('gst_number')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="drug_license_number"
                :value="__('Drug License Number')"
            />

            <x-text-input
                id="drug_license_number"
                class="block mt-1 w-full"
                type="text"
                name="drug_license_number"
                :value="old('drug_license_number')"
            />

            <x-input-error
                :messages="$errors->get('drug_license_number')"
                class="mt-2"
            />

            <p class="text-sm text-gray-500 mt-1">
                GST Number or Drug License Number is required.
            </p>

        </div>


        <div class="mt-4">

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>


        <div class="mt-4">

            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>


        <div class="flex items-center justify-end mt-4">

            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}"
            >
                Already registered?
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>