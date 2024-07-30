@extends('admin.layouts.app')

@section('title', 'Detalhes')

@section('content')
    {{-- @include('admin.users.partials.breadcrumb') --}}

    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100">Detalhes do Usuário {{ $user->name }}</h2>
    </div>
    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside">
        <li>Nome: {{ $user->name }}</li>
        <li>E-mail: {{ $user->email }}</li>
    </ul>

    <x-alert />

    <!-- @can('owner', $user)
        Pode deletar
    @else
        Não pode deletar
    @endcan -->

    @can('is-admin')
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="text-white bg-red-700 hover:bg-red-800">Deletar</button>
    </form>
    @endcan
@endsection