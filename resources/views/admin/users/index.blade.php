@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')
    {{-- @include('admin.users.partials.breadcrumb') --}}
    
    <div class="py-1 mb-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100">Usuários</h2>
    </div>
    
    <a href="{{ route('users.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:right-0">
        <i class="fa-solid fa-plus" aria-hidden="true"></i>Novo Usuário
    </a>

    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-100">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4">Nome</th>
                    <th scope="col" class="px-6 py-4">E-mail</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-400 text-sm font-light">
                @forelse ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800">
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                            <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="100">Nenhum usuário no banco!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $users->links() }}
    </div>
@endsection