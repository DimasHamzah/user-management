<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <section class="w-full md:max-w-2xl lg:max-w-4xl xl:max-w-7xl mx-auto px-4">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <x-table.header-table />
                <tbody>
                    @foreach($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <x-item.text-list-heading :label="$user->email" />
                            <x-item.text-list :label="$user->name" />
                            <x-item.text-list :label="$user->created_at" />
                            <td class="px-6 py-4">
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Red</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="w-full md:max-w-2xl lg:max-w-4xl xl:max-w-7xl mx-auto px-4 py-4">
        {{ $users->links() }}
    </section>
</x-app-layout>
