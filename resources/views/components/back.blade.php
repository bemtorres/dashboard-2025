<div class="flex flex-col space-y-3 sm:space-y-4">
  <div class="flex flex-col space-y-3 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between">
    <div class="flex items-center min-w-0 flex-1">
      @if ($href ?? false)
        <a href="{{ $href }}" class="text-primary hover:text-primary-600 inline-flex items-center mr-3 transition-colors duration-200 flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
        </a>
      @endif
      <h1 class="text-xl sm:text-2xl font-bold text-primary truncate">{{ $title }}</h1>
    </div>
    <div class="flex justify-end items-center space-x-2 sm:space-x-3 flex-shrink-0">
      {!! $slot ?? '' !!}
    </div>
  </div>
  @if($description ?? false)
    <p class="text-sm text-secondary leading-relaxed break-words">{{ $description }}</p>
  @endif
</div>
