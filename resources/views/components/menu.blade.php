<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach($categories as $category)
            <a class="p-2 text-muted" href="#">{{ $category['title'] }}</a>
        @endforeach
    </nav>
</div>
