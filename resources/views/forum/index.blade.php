<x-forum-layout>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        <x-card-forum-content :contents="$questions"/>
    </div>
    <x-pagination :paginator="$questions"/>
</x-forum-layout>