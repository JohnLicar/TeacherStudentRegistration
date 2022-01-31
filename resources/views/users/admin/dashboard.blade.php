<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard for Admin') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 flex justify-between bg-white border-b border-gray-200">
                <div class="w-80 bg-green-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                    <h1 class="ml-5 text-xl font-bold text-white">Teacher Registered</h1>
                    <div class="flex ml-14 mt-4 text-white">
                        <p class="text-7xl ml-14  font-black">{{ $teacher }}</p>
                    </div>
                </div>
                <div class="w-80 bg-green-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                    <h1 class="ml-5 text-xl font-bold text-white">Student Registered</h1>
                    <div class="flex ml-14 mt-4 text-white">
                        <p class="text-7xl ml-14  font-black">{{ $student }}</p>
                    </div>
                </div>
                <div class="w-80 bg-green-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                    <h1 class="ml-5 text-xl font-bold text-white">Course</h1>
                    <div class="flex ml-14 mt-4 text-white">
                        <p class="text-7xl ml-14  font-black">{{ $course }}</p>
                    </div>
                </div>


              </div>
              <br>
          </div>
      </div>
  </div>
</x-app-layout>
