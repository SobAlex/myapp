<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div class="mt-7">
                        @can('edit articles')
                            You can EDIT ARTICLES.
                        @endcan
                    </div>

                    <div>
                        @can('publish articles')
                            You can PUBLISH ARTICLES.
                        @endcan
                    </div>

                    <div>
                        @can('only super-admins can see this section')
                            Congratulations, you are a super-admin!
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <div class="py-16 text-center text-sm text-black dark:text-white/70">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </x-slot>
</x-app-layout>