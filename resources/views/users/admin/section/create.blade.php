<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <x-auth-validation-errors />
                    <form method="POST" action="{{ route('section.store') }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-6">

                            <div>
                                <x-label for="section_description" :value="__('Section')" />
                                <x-input id="section_description" class="block mt-1 w-full" type="text"
                                    name="section_description" :value="old('section_description')" autofocus />
                            </div>
                            <div>
                                <x-label for="course_id" :value="__('Course')" />
                                <select id="course_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="course_id" :value="old('course_id')" />
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_code}}</option>
                                @endforeach
                                </select>

                            </div>
                            <div>
                                <x-label for="year_level_id" :value="__('Year Level')" />
                                <select id="year_level_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="year_level_id" :value="old('year_level_id')" />
                                @foreach ($year_levels as $year_level)
                                <option value="{{$year_level->id}}">{{$year_level->year_description}}</option>
                                @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button class="ml-3" href="{{ route('section.index') }}">
                                {{ __('Back') }}
                            </x-back-button>
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
