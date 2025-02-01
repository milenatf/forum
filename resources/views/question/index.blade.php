<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Perguntas') }}
            </h2>
            <x-link-button link="questions.create"> Criar Pergunta</x-link-button>
        </div>
    </x-slot>
    <x-main-layout>
        <x-flash />
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Assunto</th>
                    <th scope="col" class="px-6 py-3">Conteúdo</th>
                    <th scope="col" class="px-6 py-3">Categoria</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-white text-sm font-light">
                @forelse ($questions as $question)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-70">
                        <td class="px-6 py-4">{{ $question->subject }}</td>
                        <td class="px-6 py-4">{{ $question->short_text }}</td>
                        <td class="px-6 py-4">{{ $question->category->name }}</td>
                        <td class="px-6 py-4 flex justify-center space-x-4">
                            <a href="{{ route('questions.show', $question->id) }}">
                                <i class="fa-solid fa-building w-5 h-5"></i>
                            </a>
                            <a href="{{ route('questions.edit', $question->id) }}">
                                <i class="fa-solid fa-pen-to-square w-5 h-5"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <x-pagination :paginator="$questions" />
    </x-main-layout>
</x-app-layout>