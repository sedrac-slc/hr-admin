<div class="relative overflow-x-auto mt-4">
    <table class="w-full text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">
                    Nome
                </th>
                <th scope="col" class="px-6 py-4">
                    Email
                </th>
                <th scope="col" class="px-6 py-4">
                    Acções
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center" id="row-item-user-{{ $loop->index }}">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white row-name">
                    {{ $user->name }}
                </th>
                <td class="px-6 py-4 row-email">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4 space-x-4">

                    <x-primary-button class="form-user-update" x-data="" x-on:click.prevent="$dispatch('open-modal', 'form-user')" data-url="{{ route('users.update', $user->id) }}" data-row="#row-item-user-{{ $loop->index }}">
                        {{ __('Editar') }}
                    </x-primary-button>

                    <x-danger-button class="button-confirm-deletion" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion')" data-url="{{ route('users.destroy', $user->id) }}">
                        {{__('eliminar') }}
                    </x-danger-button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
