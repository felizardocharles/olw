<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-10 lg:px-10">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" href="{{ route('clients.create') }}"> Create New Client</a>
                </div>

                <table class="min-w-full table-auto">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Email</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Actions</th>
                    </tr>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <img src="{{ asset('images/' . $client->user->email) }}"  class="w-10 h-10 rounded-full" />
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $client->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <form onsubmit="return confirm('Confirm delete this client?');" action="{{ route('clients.destroy',$client->id) }}" method="POST">
                                    <div class="flex flex-nowrap">


                                    <a href="{{ route('clients.edit', [$client->id, 'page'=>$clients->currentPage()]) }}">
                                        editar
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="page" value="{{ $clients->currentPage() }}" />
                                    <button type="submit" class="btn btn-danger">
                                       excluir
                                    </button>
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    {!! $clients->links() !!}

</x-app-layout>