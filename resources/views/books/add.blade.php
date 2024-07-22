<x-layouts.app>
    <form method="post" action="{{ route('books.store') }}" class="bg-white p-10 rounded-lg shadow-lg">
        <h2 class="text-center text-xl mb-6 text-gray-600 font-bold">Add book</h2>
        @csrf

        <div class="w-full">
            <label for="title" class="text-gray-800 font-semibold block my-3 text-md">Title</label>
            <input type="text" name="title" id="title" class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700" value="{{ old('title') }}"/>
            @error('title')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full">
            <label for="author" class="text-gray-800 font-semibold block my-3 text-md">Author</label>
            <input type="text" name="author" id="author" class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700" value="{{ old('author') }}"/>
            @error('author')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full mt-6 bg-yellow-700 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Add book</button>
    </form>
</x-layouts.app>