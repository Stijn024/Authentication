<x-layouts.app>

    <section class="w-full">
        <h2 class="text-center text-xl mb-6 text-gray-600 font-bold">All books</h2>
        <ul>
        @foreach ($books as $book)
            <a href="{{ route('books.edit', $book->id) }}" class="block text-decoration-none">
                <li class="relative bg-white p-2 rounded-lg mb-2 w-96 h-18 shadow-lg">
                    <h3 class="font-bold mb-1">{{ $book->title }}</h3>
                    <p>{{ $book->author }}</p>

                    <div class="absolute bottom-2 right-2">
                        <label for="read-{{ $book->id }}" class="">{{ $book->isRead() ? 'Finished' : 'On the shelf' }}</label>
                        <input id="read-{{ $book->id }}" type="checkbox" value="{{ $book->id }}" @checked($book->isRead()) class="toggle-read" />
                    </div>
                </li>
            </a>
        @endforeach
        </ul>
    </section>

    @push('scripts')
    <script>
        const checkboxes = document.getElementsByClassName('toggle-read');
        for (let i = 0; i < checkboxes.length; i++) {
            const checkbox = checkboxes[i];
            checkbox.addEventListener('change', function () {
                /*
                fetch('/books/toggle-read', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        id: checkbox.value,
                        isRead: checkbox.checked,
                    })
                }).then(function (response) {
                    checkbox.labels[0].innerHTML = checkbox.checked ? 'Finished' : 'On the shelf';
                }).catch(function (error) {
                    console.log(error);
                });
                */

                axios.put('/books/toggle-read', {
                    id: checkbox.value,
                    isRead: checkbox.checked,
                }).then(function (response) {
                    checkbox.labels[0].innerHTML = checkbox.checked ? 'Finished' : 'On the shelf';
                }).catch(function (error) {
                    console.log(error);
                });

            });
        }
    </script>
    @endpush

</x-layouts.app>