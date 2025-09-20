@php
    $menuSections = [
        [
            'title' => 'Dashboard',
            'items' => [
                [
                    'name' => 'Dashboard',
                    'url' => route('admin.dashboard'),
                    'icon' =>
                        'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                    'active' => activeTab(['admin/dashboard']),
                ],
            ],
        ],
        [
            'title' => 'Catálogo',
            'items' => [
                [
                    'name' => 'Programas',
                    'url' => route('admin.programs.index'),
                    'icon' => 'M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z',
                    'active' => activeTab(['admin/programs*']),
                ],
                [
                    'name' => 'Cursos',
                    'url' => route('admin.courses.index'),
                    'icon' =>
                        'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                    'active' => activeTab(['admin/courses*']),
                ],
                [
                    'name' => 'Contenidos',
                    'url' => route('admin.contents.index'),
                    'icon' =>
                        'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'active' => activeTab(['admin/contents*']),
                ],
            ],
        ],
        [
            'title' => 'Gestión',
            'items' => [
                [
                    'name' => 'Usuarios',
                    'url' => route('admin.users.index'),
                    'icon' =>
                        'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z',
                    'active' => activeTab(['admin/users*']),
                ],
                [
                    'name' => 'Asignar Programas',
                    'url' => route('admin.assign-programs.index'),
                    'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z',
                    'active' => activeTab(['admin/assign-programs*']),
                ],
                [
                    'name' => 'Reportes',
                    'url' => route('admin.reports.index'),
                    'icon' =>
                        'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                    'active' => activeTab(['admin/reports*']),
                ],
                [
                    'name' => 'Configuración',
                    'url' => route('admin.settings'),
                    'icon' =>
                        'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                    'active' => activeTab(['admin/settings']),
                ],
            ],
        ],
    ];
@endphp


 <div class="fixed inset-y-0 left-0 z-50 w-64 sidebar transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0"
     id="sidebar">
     <div class="flex items-center justify-between h-16 px-4 sidebar-header">
         <h1 class="text-lg lg:text-xl font-bold text-white">Admin Panel</h1>
         <button type="button"
             class="lg:hidden text-white hover:text-gray-200 focus:outline-none focus:text-gray-200 transition-colors duration-200 p-1 rounded-md hover:bg-primary-700"
             id="close-sidebar">
             <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
             </svg>
         </button>
     </div>

    <!-- Navigation -->
    <nav class="mt-5 px-2">
        <div class="space-y-6">
            @foreach ($menuSections as $section)
              @if ($section['title'] !== 'Dashboard')
              <div class="px-3 mb-2">
              <h3 class="text-xs font-semibold text-tertiary tracking-wider">
              {{ $section['title'] }}
              </h3>
              </div>
              @endif
              <div class="space-y-1">
              @foreach ($section['items'] as $item)
              <a href="{{ $item['url'] }}" class="sidebar-item {{ $item['active'] === 'active' ? 'active' : '' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="{{ $item['icon'] }}"></path>
                </svg>
                <span class="truncate">{{ $item['name'] }}</span>
              </a>
              @endforeach
              </div>
            @endforeach
        </div>
    </nav>
</div>
