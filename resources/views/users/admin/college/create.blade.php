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
                  <form method="POST" action="{{ route('course.store') }}" >
                      @csrf
                      <div class="grid grid-cols-2 gap-6">
                          
                              <div>
                                  <x-label for="course_code" :value="__('Course Code')" />
                                  <x-input id="course_code" class="block mt-1 w-full" type="text" name="course_code" :value="old('course_code')" autofocus />
                              </div>
                              <div>
                                  <x-label for="course_description" :value="__('Course Description')" />
                                  <x-input id="course_description" class="block mt-1 w-full" type="text" name="course_description" :value="old('course_description')"/>
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
