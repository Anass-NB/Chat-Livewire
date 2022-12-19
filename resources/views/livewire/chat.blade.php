<div wire:poll.1s>
  <div style="margin-left: 70px">
    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
      <a href="{{ url("deletechat") }}">Delete Chat</a>
    </button>

    <div class="inbox"
      style="height: 500px;width: 100%;background:#ccc;position: relative;padding:20px; overflow:scroll">
      <div class="messages">

        @forelse ($messages as $message)
          @if ($message->user_id == auth()->user()->id)
            <div class="bg-green-400 ">
              <p class="">{{ $message->message }} </p>
              {{-- Time --}}
              <span
                class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                    clip-rule="evenodd"></path>
                </svg>
                {{ $message->created_at->diffForHumans(null, false, false) }} From {{ auth()->user()->name }}
              </span>

            </div>
          @else
            <div class="bg-teal-600 ">
              <div class="">
                <div class="overflow-hidden relative w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                  <svg class="absolute -left-1 w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                      clip-rule="evenodd"></path>
                  </svg>
                </div>
                <h5 class="lead text-black-700">{{ $message->user->name }}</h5>
              </div>

              <p class="">{{ $message->message }} </p>
              <span
                class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                    clip-rule="evenodd"></path>
                </svg>
                {{ $message->created_at->diffForHumans(null, false, false) }}
              </span>
            </div>
          @endif
        @empty
          <p>No messages</p>
        @endforelse

      </div>
      

    </div>
    <div class="form">
      <form wire:submit.prevent="send"
        style="position: absolute;justify-content: center;align-items: center;bottom: 0;transform: translateX(-50%);left: 50%;display: flex;">
        <input type="text" wire:model.defer="message" required placeholder="Your Message">
        <button type="submit" class="p-2 bg-black text-white">Send</button>
      </form>
    </div>
  </div>

</div>
