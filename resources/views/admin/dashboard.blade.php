@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <section class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Painel Administrativo</h2>
            <p class="text-slate-600">Resumo rápido do sistema para tomada de decisão.</p>
        </div>
        <a href="/usuarios/novo" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700">
            Novo registro
        </a>
    </section>
    <section class="mt-8 grid gap-4 md:grid-cols-3">
        <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Projetos ativos</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">12</p>
        </article>
        <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Usuários cadastrados</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">{{ $usuarios->count() }}</p>
        </article>
        <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Pendências</p>
            <p class="mt-2 text-3xl font-bold text-amber-600">5</p>
        </article>
    </section>

    {{-- SISTEMA-USUARIOS-FILTRO --}}

    @if(session('sucesso'))
        <div class="mt-6 rounded-lg bg-green-100 p-4 text-green-800">
            {{ session('sucesso') }}
        </div>
    @endif

    <form action="/admin" method="GET"
          class="mt-6 flex flex-wrap gap-2">

        <input
            type="search"
            name="busca"
            value="{{ $busca ?? '' }}"
            placeholder="Pesquisar usuário..."
            class="flex-1 rounded-lg border border-slate-300 px-4 py-2"
        >

        <button type="submit"
                class="rounded-lg bg-slate-900 px-4 py-2 text-white">
            Buscar
        </button>

        <a href="/admin"
           class="rounded-lg border border-slate-300 px-4 py-2">
            Limpar
        </a>
    </form>
<section class="mt-8 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <h3 class="text-xl font-semibold text-slate-900">Registros recentes</h3>

        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full border-collapse text-left">
                <thead>
                    <tr class="border-b border-slate-200 text-sm text-slate-500">
                        <th class="py-3">Nome</th>
                        <th class="py-3">E-mail</th>
                        <th class="py-3">Cadastro</th>
<th class="py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700">

    @forelse($usuarios as $user)
        <tr class="border-b border-slate-100">

            <td class="py-3">
                {{ $user->name }}
            </td>

            <td class="py-3">
                {{ $user->email }}
            </td>

            <td class="py-3">
                {{ $user->created_at?->format('d/m/Y') ?? '-' }}
            </td>

            <td class="py-3">
                <form
                    action="{{ route('usuarios.destroy', $user) }}"
                    method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700"
                    >
                        Excluir
                    </button>
                </form>
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="4" class="py-6 text-center">
                Nenhum usuário encontrado.
            </td>
        </tr>
    @endforelse

</tbody>
            </table>
        </div>
    </section>
    <footer class="mt-8 rounded-xl bg-slate-900 px-6 py-4 text-sm text-slate-300">
        <div class="flex flex-wrap items-center justify-between gap-2">
            <p>© {{ date('Y') }} Painel Administrativo</p>
            <p>Versão 1.0.0</p>
        </div>
    </footer>
@endsection
