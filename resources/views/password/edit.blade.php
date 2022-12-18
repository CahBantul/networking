<x-app-layout>
  @slot('header')
    <h1 class="font-semibold text-xl">
      Change Your Password
    </h1>
  @endslot

  <x-container>
    <div class="flex">
      <div class="w-full lg:w-1/2">
        <x-card>
          <form action="{{ route('password.edit') }}" method="post">
            @method("put")
            @csrf
            <div class="mb-5">
              <x-label for="current_password">Current Password</x-label>
              <x-input class="mt-1 w-full" type="password" name="current_password" id="current_password" />
                @error('current_password')
                <div class="text-red-500 mt-2 text-sm">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-5">
              <x-label for="password">New Password</x-label>
              <x-input class="mt-1 w-full" type="password" name="password" id="password" />
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-5">
              <x-label for="password_confirmation">Confirm Password</x-label>
              <x-input class="mt-1 w-full" type="password" name="password_confirmation" id="password_confirmation" />
                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <x-button>Update</x-button>

          </form>
        </x-card>
      </div>
    </div>
  </x-container>
</x-app-layout>