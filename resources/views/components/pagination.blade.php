@props(['paginator'])
<div class="px-2 mt-4">
    {{ $paginator->links() ?? '' }}
</div>