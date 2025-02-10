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
                    @if (count($posts) === 0)
                        <p class="px-7 mt-2 font-bold">Постов нет</p>
                    @endif

                    @can('only super-admins can see this section')
                        <a class="inline-flex items-center px-5 py-2.5 mt-4 mb-4 ml-4 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                            href="{{ route('admin.post.create') }}">Create post</a>
                    @endcan

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    id
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Post
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    @can('only super-admins can see this section')
                                        Action
                                    @endcan
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                @if ($post->isPublick)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $post->id }}
                                        </th>

                                        <td class="px-6 py-4">
                                            {{ $post->title }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{Illuminate\Support\Str::limit(strip_tags($post->content), 100)}}
                                            <a class="text-sky-700 font-bold"
                                                href="{{ route('admin.post.show', $post->id) }}">Читать далее</a>
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $post->category->title }}
                                        </td>

                                        <td class="px-6 py-4">
                                            @can('only super-admins can see this section')
                                                <div class="flex">

                                                    <a href="{{ route('admin.post.edit', $post) }}"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-green-800 hover:bg-green-800 mb-5">Edit</a>

                                                    <form method="POST" action="{{ route('admin.post.delete', $post) }}">
                                                        @csrf
                                                        @method('delete')

                                                        <x-danger-button class="ml-2">
                                                            {{ __('Delete') }}
                                                        </x-danger-button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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