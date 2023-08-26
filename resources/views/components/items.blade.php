<ul class="flex flex-col md:flex-row px-4">
    @auth
    <li>
        <form action="/admin/logout" method="POST">
        @csrf
        <button class="block py-2 pr-4 pl-3 right-0">Logout</a>
        </form>
    </li>
    @else
    <li>
        <a href="/admin/login" class="block py-2 pr-4 pl-3">Sign In</a>
    </li>
    @endauth
</ul>