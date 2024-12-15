<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w">

                    <x-secondary-button id="button-user-create" x-data="" x-on:click.prevent="$dispatch('open-modal', 'form-user')" data-url="{{ route('users.store') }}">
                        {{ __('Adicionar') }}
                    </x-secondary-button>

                    @include('user.partials.user-table')

                </div>
            </div>
        </div>
    </div>

    @include('user.partials.user-form')

    <x-confirm-deletion-modal/>

</x-app-layout>
