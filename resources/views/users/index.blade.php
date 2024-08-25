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
                            <td class="px-6 py-4 flex space-x-4">
                                <x-button.button-update />
                                <form action="{{ route('user-management.update', $user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <x-button.button-delete />
                                </form>
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
