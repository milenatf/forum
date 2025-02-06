<x-forum-layout>
    <div class="grid gap-6 lg:gap-8">
        <div
        class="flex items-start gap-4 rounded-lg bg-white p-6
		shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]
		ring-1 ring-white/[0.05] transition duration-300
		hover:text-black/70 hover:ring-black/20 focus:outline-none
		focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900
		dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700
		dark:focus-visible:ring-[#FF2D20]">
        <div class="pt-3 sm:pt-5">
            <a href="{{ route('forum.index') }}">Voltar</a>
            <x-flash/>
            <h2 class="text-xl font-semibold text-black dark:text-white">{{ $question->subject }}</h2>

            <p class="mt-4 text-sm/relaxed">
                {{ $question->text }}
            </p>


            <div class="flex justify-start w-full mt-4 space-x-4">
                <p class="text-sm/relaxed">Autor: {{ $question->user->name }}</p>
                <p class="text-sm/relaxed">Categoria: {{ $question->category->name }}</p>
            </div>

            <div class="w-full mt-4">
                @if (count($question->replies) > 0)
                    <h2 class="text-xl font-semibold text-black dark:text-white mb-4">Respostas</h2>
                @endif

                @forelse ($question->replies as $reply)
                <p class="text-black dark:text-white font-semibold">{{ $reply->user->name }}:</p>
                <p class="mt-1 text-sm/relaxed"> {{ $reply->text }} </p>
                @empty
                 <h2 class="mt-1 text-center text-xl font-semibold text-black dark:text-white"> Não há respostas cadastradas</h2>
                @endforelse
            </div>

            @auth
            <div class="w-full mt-4">
                <h3 class="text-black dark:text-white font-semibold mb-2">Digite sua resposta abaixo:</h3>
                <x-error-message />
                <form action="{{ route('forum.reply') }}" method="POST">
                @csrf
                <input name="question_id" type="hidden" value="{{ $question->id }}">
                <textarea name="text" id="" rows="10" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ @old('text') }}</textarea>
                <x-primary-button class="float-right mt-6">Responder</x-primary-button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</x-forum-layout>