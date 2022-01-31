<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="relative flex space-x-4  my-6 mx-6">
            <a href="{{ route('section.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Add Course</a>
            <x-input wire:model.debounce.300ms="search" id="search" class="absolute right-0 w-1/3" type="search"
                name="search" placeholder="Search Section" :value="old('search')" />
        </div>

        <div class="w-1/6 mx-6 ">
            <select wire:model="perPage"
                class="block appearance-none w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="grid-state">
                <option>2</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
            <div x-data="{ show: true }" x-show.transition.opacity.out.duration.2000ms="show"
                x-init="setTimeout(() => show = false, 3000)">
                <x-success-message />
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th wire:click.prevent="sortBy('section_description')"
                                            class="pl-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                            Section
                                            @include('partials._sort-icon', ['field'=>'section_description'])
                                        </th>
                                        <th wire:click.prevent="sortBy('year_level_id')"
                                            class="py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                            Year Level
                                            @include('partials._sort-icon', ['field'=>'year_level_id'])
                                        </th>
                                        <th wire:click.prevent="sortBy('year_level_id')"
                                            class="py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                            Course
                                            @include('partials._sort-icon', ['field'=>'year_level_id'])
                                        </th>
                                        <th
                                            class="text-center text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>


                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($sections as $section)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                                            {{ $section->section_description }}

                                        </td>
                                        <td class="py-4 whitespace-nowrap text-md text-gray-500">
                                            {{ $section->yearLevel->year_description }}
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-md text-gray-500">
                                            {{ $section->course->course_code }}
                                        </td>
                                        <td class="whitespace-nowrap text-center text-sm font-medium">
                                            <a href="{{ route('section.edit', $section) }}"
                                                class="bg-indigo-500 hover:bg-indigo-700 text-white hover:text-white-900 rounded-full  px-3">Edit</a>

                                            <form class="inline-block" action="{{ route('section.destroy', $section) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white hover:text-white-900 rounded-full  px-2"
                                                    value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="mt-4">
                            {{ $sections->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>