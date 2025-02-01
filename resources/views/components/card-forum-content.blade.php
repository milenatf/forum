@props(['contents'])

@foreach ($contents as $content)
        <a href="{{ route('forum.show', $content->id) }}"
            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
            <div class="pt-3 sm:pt-5">
                <h2 class="text-xl font-semibold text-black dark:text-white">{{ $content->subject }}</h2>

                <p class="mt-4 text-sm/relaxed">
                    {{ $content->short_text }}
                </p>
                <div class="flex justify-between items-end w-full mt-4 space-x-4">
                    <p class="text-sm/relaxed">
                    Autor: {{ $content->user->name }}</p>
                     <p class="text-sm/relaxed">
                     Categoria: {{ $content->category->name }}</p>
                 </div>
            </div>

            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </a>
@endforeach