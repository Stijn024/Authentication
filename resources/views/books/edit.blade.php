<x-layouts.app>
    <section class="w-96 relative">
        <form method="post" action="{{ route('books.update', $book->id) }}" class="bg-white p-10 rounded-lg shadow-lg">
            @method('put')
            <h2 class="text-center text-xl mb-6 text-gray-600 font-bold">Add book</h2>
            @csrf

            <div class="w-full">
                <label for="title" class="text-gray-800 font-semibold block my-3 text-md">Title</label>
                <input type="text" name="title" id="title" class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700" value="{{ old('title', $book->title ) }}"/>
                @error('title')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full">
                <label for="author" class="text-gray-800 font-semibold block my-3 text-md">Author</label>
                <input type="text" name="author" id="author" class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700" value="{{ old('author', $book->author) }}"/>
                @error('author')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full">
                <label for="read_at" class="text-gray-800 font-semibold block my-3 text-md">Read At</label>
                <input type="date" name="read_at" id="read_at" class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700" value="{{ old('read_at', $book->read_at) }}"/>
                @error('read_at')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="w-1/3 mt-6 bg-yellow-700 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
            </div>

        </form>

        <form method="post" action="{{ route('books.destroy', ['book' => $book]) }}" class="absolute bottom-10 left-10">
            @method('delete')
            @csrf
            <button type="submit" class="mt-6 bg-red-700 rounded-lg px-6 py-2 text-lg text-white tracking-wide font-semibold font-sans">Delete</button>
        </form>   
        

    </section>
</x-layouts.app>
    