<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

                        <img class="rounded-t-lg max-w-sm" src={{ Vite::asset('resources/images/fon_dost.jpg') }}
                            alt="Фото питера" />

                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}
                            </h5>

                            <span class="text-slate-400 py-4">{{ $post->category->title }}</span>

                            <p class="mt-3 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->content }}</p>

                            <div class="flex items-center">
                                <img class="rounded-full w-9 h-9"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                                    alt="profile picture">
                                <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                                    <p>{{$post->owner->name}}</p>
                                    <span class="text-slate-400">{{$post->updated_at->format('d.m.Y')}}</span>

                                </div>
                            </div>

                            <p>{{ $post->slug }}</p>

                        </div>
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