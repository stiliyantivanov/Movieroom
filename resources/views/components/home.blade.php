<x-app>
    <section>
        <div class="lg:flex lg:justify-center">
            <div class="lg:w-40 lg:relative px-4">
                @include ('sidebar-links')
            </div>

            <div class="lg:flex-1 lg:mx-20 lg:mb-10">
                {{ $slot ?? ''}}               
            </div>
        </div>
    </section>
</x-app>
