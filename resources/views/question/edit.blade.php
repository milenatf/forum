<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Criar Pergunta') }}
            </h2>
            <x-link-button link="questions.index">Listagem de Perguntas</x-link-button>
        </div>
    </x-slot>

    <x-main-layout>
        <x-error-message />
        <form action="{{ route('questions.update', $question->id) }}" method="post">
            @csrf
            @method('PUT')
            @include('question.partials.form')
        </form>
    </x-main-layout>
</x-app-layout>