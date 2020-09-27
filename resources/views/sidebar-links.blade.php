<ul>
    <li>
        <a
            class="font-bold text-xl text-white mb-3 block"
            href="/"
        >
            Home
        </a>
    </li>

    <hr class="border-2 border-red-400">

    <li>
        <a
            class="font-bold text-xl text-white my-3 block"
            href="/movies"
        >
            Movies
        </a>
    </li>

    <hr class="border-2 border-red-400">

    <li>
        <a
            class="font-bold text-xl text-white my-3 block"
            href="/series"
        >
            Series
        </a>
    </li>

    <hr class="border-2 border-red-400">

    <li>
        <a
            class="font-bold text-xl text-white my-3 block"
            href="/actors"
        >
            Actors
        </a>
    </li>

    <hr class="border-2 border-red-400">

    <li>
        <a
            class="font-bold text-xl text-white my-3 block"
            href="/tags"
        >
            Tags
        </a>
    </li>

    <hr class="border-2 border-red-400">

    <li>
        <a
            class="font-bold text-xl text-white my-3 block"
            href="/users"
        >
            Users
        </a>
    </li>

    @auth
        <hr class="border-2 border-red-400">

        <li>
            <a
                class="font-bold text-xl text-white my-3 block"
                href="/users/{{auth()->user()->id}}"
            >
                Profile
            </a>
        </li>
    @endauth

</ul>