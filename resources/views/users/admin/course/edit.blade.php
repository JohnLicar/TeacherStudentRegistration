<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Updae Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors />

                    <form method="POST" action="{{ route('course.update', $course) }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">

                            <div>
                                <x-label for="name" :value="__('Course Code')" />
                                <x-input id="course_code" class="block mt-1 w-full" type="text" name="course_code"
                                    value="{{ $course->course_code }}" autofocus />
                            </div>
                            <div>
                                <x-label for="course_description" :value="__('Course Description')" />
                                <x-input id="course_description" class="block mt-1 w-full" type="text"
                                    name="course_description" value="{{ $course->course_description }}" autofocus />
                            </div>


                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button class="ml-3" href="{{ route('course.index') }}">
                                {{ __('Back') }}
                            </x-back-button>
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>