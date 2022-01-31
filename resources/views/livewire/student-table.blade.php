<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="relative block my-6 mx-6">
            <a href="{{ route('student.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white  py-2 px-4 rounded">Add Teacher</a>
            <x-input wire:model.debounce.300ms="search" id="search" class="absolute right-0 w-1/3" type="search"
                name="search" placeholder="Search Student" :value="old('search')" />
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
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th wire:click.prevent="sortBy('first_name')"
                                            class="pl-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Image
                                        </th>
                                        <th wire:click.prevent="sortBy('first_name')"
                                            class="pl-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                            @include('partials._sort-icon', ['field'=>'first_name'])
                                        </th>
                                        <th wire:click.prevent="sortBy('email')"
                                            class="py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                            @include('partials._sort-icon', ['field'=>'email'])
                                        </th>
                                        <th wire:click.prevent="sortBy('birthday')"
                                            class=" py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Birthday
                                            @include('partials._sort-icon', ['field'=>'birthday'])
                                        </th>
                                        <th
                                            class="py-3 text-center text-md font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($students as $student)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">

                                            @if (!$student->avatar)
                                            <img src="{{ Avatar::create($student->first_name . ' ' . $student->last_name)->toBase64() }}"
                                                class="mx-2" />
                                            @else
                                            <img src="{{asset('images/profile/'.$student->avatar)}}" alt="User Picture"
                                                class="w-12 h-12 border rounded-full dark:border-coolGray-700 mx-2">
                                            @endif


                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                                            {{ $student->first_name . " " . $student->last_name}}
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-md text-gray-500">
                                            {{ $student->email}}
                                        </td>
                                        <td class=" py-4 whitespace-nowrap text-md text-gray-500">
                                            {{ $student->birthday->toFormatedDate()}}
                                        </td>

                                        <td class="whitespace-nowrap text-center text-sm font-medium ">
                                            <a href="{{ route('student.edit', $student) }}"
                                                class="bg-indigo-500 hover:bg-indigo-700 text-white hover:text-white-900 rounded-full  px-3">Edit</a>

                                            <form class="inline-block" action="{{ route('student.destroy', $student) }}"
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
                            {{ $students->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>