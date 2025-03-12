<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit post</h2>

                        <form method="POST" action="{{ route('admin.post.update', $post) }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('patch')
                            <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <input type="text" name="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type post title" required value="{{ $post->title }}">
                                </div>

                                @error('title')
                                    <div class="text-orange-700">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="sm:col-span-2">
                                    <textarea name="content"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type text" required>{{ $post->content }}</textarea>
                                </div>

                                @error('content')
                                    <div class="text-orange-700">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="max-w-sm mx-auto">
                                    <label for="categories"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                                        category</label>
                                    <select id="categories" name="category_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected="selected" disabled>Выберите категорию</option>
                                        @foreach($categories as $category)
                                            <option {{ $category->id === $post->category->id ? ' selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <p><img class="w-96" src="{{ Vite::asset($postPreviewImgPath) }}"
                                        alt="{{ $postPreviewImgPath }}"></p>

                                <div class="sm:col-span-2">
                                    <label for="preview_image">preview image</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="user_avatar_help" id="preview_image" name="preview_image"
                                        type="file">
                                </div>

                                <p><img class="w-96" src="{{ Vite::asset($postDetailImgPath) }}"
                                        alt="{{ $postDetailImgPath }}"></p>

                                <div class="sm:col-span-2">
                                    <label for="detail_image">detail image</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="user_avatar_help" id="detail_image" name="detail_image"
                                        type="file">
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="isPublick" value="1"
                                        name="isPublick" checked="checked">
                                    <label class="form-check-label" for="isPublick">Опубликовать</label>
                                </div>

                                <input type="submit"
                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                                    value="Обновить">
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
