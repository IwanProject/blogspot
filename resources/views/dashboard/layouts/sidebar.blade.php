<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <i style="color:lightgray;" class="fas fa-blog fa-5x mt-5"></i>
    </div>
    <div class="list-group list-group-flush mt-5">
        <div class="list-group list-group-flush ">

            @if (auth()->user()->is_admin == 1)
                <a href="/dashboard"
                    class="list-group-item list-group-item-action text-dark  {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    Dashboard</a>

            @endif
            <a href="/dashboard/posts"
                class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
                <i class="far fa-file-alt"></i>
                All Posts</a>

            @if (auth()->user()->is_admin == 1)
                <a href="/dashboard/post_review"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/review*') ? 'active' : '' }}">
                    <i class="fas fa-hourglass-half"></i>
                    Post Review</a>
                <a href="/dashboard/comments"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/comments*') ? 'active' : '' }}">
                    <i class="far fa-file-alt"></i>
                    All Comments</a>
                <a href="/dashboard/comments_review"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/comments_review*') ? 'active' : '' }}">
                    <i class="fas fa-hourglass-half"></i>
                    Comments Review</a>
                <a href="/dashboard/categories"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Categories</a>
                <a href="/dashboard/users" class="list-group-item list-group-item-action text-dark"> <i
                        class="fas fa-users"></i>
                    Users</a>
            @endif

            @if (auth()->user()->is_admin == 2)
                <a href="/dashboard/post_review"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/review*') ? 'active' : '' }}">
                    <i class="fas fa-hourglass-half"></i>
                    Post Review</a>
                <a href="/dashboard/comments"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/comments*') ? 'active' : '' }}">
                    <i class="far fa-file-alt"></i>
                    All Comments</a>
                <a href="/dashboard/comments_review"
                    class="list-group-item list-group-item-action text-dark {{ Request::is('dashboard/comments_review*') ? 'active' : '' }}">
                    <i class="fas fa-hourglass-half"></i>
                    Comments Review</a>
            @endif

            <a href="/dashboard/account/{{ auth()->user()->id }}/edit"
                class="list-group-item list-group-item-action text-dark"> <i class="fas fa-user-alt"></i>
                Account</a>
        </div>
    </div>
</div>
