<x-app-layout>
  <x-container>
    <div class="grid grid-cols-12 gap-6">
      <div class="col-span-7">
        <x-card>
          <form action="{{ Route('status.store') }}" method="post">
            @csrf
            <div class="flex ml-6">
              <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}">
              </div>
              <div class="w-full">
                <div class="font-semibold">
                  {{ Auth::user()->name }}
                </div>
                <div class="leading-relaxed my-5">
                  <textarea name="body" id="body" placeholder="What is in your mind ?" class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"></textarea>
                </div>
                <div class="text-right">
                  <x-button>Post</x-button>
                </div>
  
              </div>
            </div>
          </form>
        </x-card>
        <div class="space-y-6 mt-5">
          <div class="space-y-5">
           <x-statuses :statuses="$statuses" ></x-statuses>
          </div>
        </div>
      </div>
      @if(auth()->user()->follows()->count())
        <div class="col-span-5">
          <x-card>
            <h1 class="font-semibold mb-5">Recently follows</h1>
            <div class="space-y-5">
            <x-following :users="Auth::user()->follows()->limit(4)->get()"></x-following>
            </div>
          </x-card>
        </div>
      @endif
    </div>
  </x-container>
</x-app-layout>
