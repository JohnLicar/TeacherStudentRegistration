<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('College') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="block my-6 mx-6">
                <a href="{{ route('course.create') }}" 
                class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Add College</a>
            </div>
           
              <div class="p-6 bg-white border-b border-gray-200">
                <div 
                    x-data="{ show: true }" 
                    x-show.transition.opacity.out.duration.2000ms="show" 
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
                                          <th  class="pl-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                              College Code
                                          </th>
                                          <th  class="py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                            College Description
                                          </th>
                                          <th  class="py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                                              Action
                                          </th>
                                        
                                         
                                      </tr>
                                      </thead>
                                      <tbody class="bg-white divide-y divide-gray-200">
                                      @foreach ($courses as $course)
                                      <tr>
                                          <td  class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                                              {{ $course->course_code}}
                                          </td>
                                          <td  class="py-4 whitespace-nowrap text-md text-gray-500">
                                              {{ $course->course_description}}
                                          </td>
                                            <td  class="whitespace-nowrap text-center text-sm font-medium ">
                                                <a href="{{ route('course.edit', $course) }}" class=" text-indigo-600 hover:text-indigo-900">Edit</a>
                                              
                                                <form class="inline-block" action="{{ route('course.destroy', $course) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="text-red-600 hover:text-red-900 bg-transparent ml-3" value="Delete">
                                                </form>
                                            </td>                                    
                                      </tr>
                                      @endforeach
                                      </tbody>
                                  </table>

                              </div>
                              <div class="mt-4">
                              {{ $courses->links() }}
                              </div>
                    
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>