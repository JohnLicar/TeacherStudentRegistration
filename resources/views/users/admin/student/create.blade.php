<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <x-auth-validation-errors />
                    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-3 gap-6">

                            <div>
                                <x-label for="name" :value="__('First Name')" />
                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                    autofocus />
                            </div>
                            <div>
                                <x-label for="middle_name" :value="__('Middle Name')" />
                                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                                    autofocus />
                            </div>
                            <div>
                                <x-label for="last_name" :value="__('Last Name')" />
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                    autofocus />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" autofocus />
                            </div>
                            <div>
                                <x-label for="birthday" :value="__('Birthday')" />
                                <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                                    autofocus />
                            </div>
                            <div>
                                <x-label for="avatar" :value="__('Image')" />
                                <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar"
                                    :value="old('avatar')" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>