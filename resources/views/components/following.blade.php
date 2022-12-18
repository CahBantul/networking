@foreach ($users as $user)
  <x-card>
    <div class="flex ml-6 items-center">
      <div class="flex-shrink-0 mr-3">
        <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
      </div>
      <div>
        <a href="{{ route('profile', $user->username) }}" class="font-semibold block">
        {{$user->name}}
        </a>

        @if(request()->routeIs('users.index'))
          <div class="mt-2">
            <form action="{{ route('following.store', $user) }}" method="POST" >
              @csrf
              <x-button>
                @if(Auth::user()->follows()->where('following_user_id', $user->id)->first())
                  unfollow
                @else
                  follow
                @endif
              </x-button>
            </form>
          </div>
        @endif
        <div class="text-sm text-gray-600">
          @if($user->pivot)
            {{ $user->pivot->created_at->diffForHumans() }}
          @endif
        </div>
      </div>
    </div>
  </x-card>
@endforeach