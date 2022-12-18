<div class="border-b mb-5">
  <x-container>
    <div class="flex justify-between items-center">
      <div class="flex">
        <a href="{{ route('profile', $user->username) }}" class="px-10 py-3 text-center border-r border-l">
          <div class="text-2xl font-semibold mb-1">{{ $user->statuses->count() }}</div>
          <div class="uppercase text-xs text-gray-600">Status</div>
        </a>
        <a href="{{ route('following.index', [$user->username, 'following']) }}" class="px-10 py-3 text-center border-r border-l">
          <div class="text-2xl font-semibold mb-1">{{ $user->follows->count() }}</div>
          <div class="uppercase text-xs text-gray-600">Following</div>
        </a>
        <a href="{{ route('following.index', [$user->username, 'follower']) }}" class="px-10 py-3 text-center border-r border-l">
          <div class="text-2xl font-semibold mb-1">{{ $user->followers->count() }}</div>
          <div class="uppercase text-xs text-gray-600">Follower</div>
        </a>
      </div>
      <div>
        @if(Auth::user()->isNot($user))
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
        @else
          <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl font-semibold text-xm text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">Edit Profile</a>
        @endif
      </div>
    </div>
  </x-container>
</div>