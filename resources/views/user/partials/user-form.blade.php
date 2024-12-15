<x-modal name="form-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('users.store') }}" class="mt-2 space-y-6 p-6" id="form-user">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $user->name ?? '')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                :value="old('email', $user->email ?? '')" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="btn-user-action">{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</x-modal>

<script>
    const buttonsFormUpdate = document.querySelectorAll('.form-user-update');
    const formUser = document.querySelector('#form-user');
    const buttonactionUser = formUser.querySelector('#btn-user-action');
    const buttonUserCreate = document.querySelector('#button-user-create');
    const methodUser = formUser.querySelector('input[name="_method"]');

    buttonUserCreate.addEventListener('click',() => {
        formUser.action = buttonUserCreate.dataset.url;
        buttonactionUser.innerHTML = "Adicionar";
        methodUser.value = "POST";
        changeValueForm([ { id: "name", text: "" }, { id: "email", text: ""}]);
    });

    buttonsFormUpdate.forEach(item => {
        item.addEventListener('click',() => {
            const row = document.querySelector(item.dataset.row);
            formUser.action = item.dataset.url;
            buttonactionUser.innerHTML = "Editar";
            methodUser.value = "PUT";
            changeValueForm([
                { id: "name", text: row.querySelector('.row-name').innerHTML.trim() },
                { id: "email", text: row.querySelector('.row-email').innerHTML.trim() }
            ]);
        });
    });

</script>
