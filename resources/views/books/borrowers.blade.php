<x-layouts.app>
    <section class="w-196 relative">
    
        <form method="POST" action="{{ route('borrowers.store') }}" class="bg-white p-10 rounded-lg shadow-lg">
            @csrf
            <h2 class="text-center text-xl mb-6 text-gray-600 font-bold">Add borrowers</h2>

            <div class="w-full">

            <table class="table-auto">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="w-full">
                            <input type="text" 
                                    name="borrowers[{{ $i }}][name]" 
                                    id="borrowers[{{ $i }}][name]"
                                    value="{{ old('borrowers')[$i]['name'] ?? ''}}"
                                    class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700">
                            @foreach ($errors->get("borrowers.$i.name") as $error)
                                <p class="text-red-500 text-xs">{{ $error }}</p>
                            @endforeach
                        </div>                        
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="w-full">
                            <input type="email" 
                                    name="borrowers[{{ $i }}][email]" 
                                    id="borrowers[{{ $i }}][email]"
                                    value="{{ old('borrowers')[$i]['email'] ?? ''}}"
                                    class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700">
                            @foreach ($errors->get("borrowers.$i.email") as $error)
                                <p class="text-red-500 text-xs">{{ $error }}</p>
                            @endforeach
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="w-full">
                            <input type="text" 
                                    name="borrowers[{{ $i }}][phone_number]" 
                                    id="borrowers[{{ $i }}][phone_number]"
                                    value="{{ old('borrowers')[$i]['phone_number'] ?? ''}}"
                                    class="w-full bg-orange-100 px-4 py-2 rounded-lg focus:outline-yellow-700">
                            @foreach ($errors->get("borrowers.$i.phone_number") as $error)
                                <p class="text-red-500 text-xs">{{ $error }}</p>
                            @endforeach     
                        </div>                       
                    </td>
                </tr>
                @endfor
                </tbody>
            </table>
        </div>
            <div class="mt-6">
                <button type="submit" class="w-1/3 mt-6 bg-yellow-700 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save borrowers</button>

                <a href="{{ route('books.index') }}" class="w-1/3 mt-6 bg-red-500 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">
                    Cancel
                </a>                
            </div>
        </form>

    </section>
</x-layouts.app>
    