<x-modal name="confirm-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form id="form-confirm-deletion" method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Confirmação?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Tens a certeza que desejas realizar esta acção? Não será possível a reversão desta acção caso seja efectuada.') }}
        </p>

        <div class="mt-6">

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Confirmar') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>

<script>
    const buttonsConfirmDeletion = document.querySelectorAll(".button-confirm-deletion");
    const formConfirmDeletion = document.querySelector("#form-confirm-deletion");

    buttonsConfirmDeletion.forEach(item => {
        item.addEventListener('click', () => {
            formConfirmDeletion.action = item.dataset.url;
        })
    });
</script>
