<x-layout>

    <section class="px-6 py-8">
        <main
            class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl ">
            <h1 class="text-center font-bold text-xl">Login!</h1>
            <form class="mt-10" action="/login" method="POST">
                @csrf
                <x-input-field :type="'email'" :name="'email'">Email</x-input-field>
                <x-input-field :type="'password'" :name="'password'">Password</x-input-field>
                <x-submit-button>Login</x-submit-button>
            </form>

        </main>

    </section>
</x-layout>
