<x-layout.default>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <div x-data="auth">
        <div class="absolute inset-0">
            <img src="/assets/images/auth/bg-gradient.png" alt="image" class="h-full w-full object-cover" />
        </div>
        <div class="relative flex min-h-screen items-center justify-center bg-[url(/assets/images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16">
            <img src="/assets/images/auth/coming-soon-object1.png" alt="image" class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2" />
            <img src="/assets/images/auth/coming-soon-object2.png" alt="image" class="absolute left-24 top-0 h-40 md:left-[30%]" />
            <img src="/assets/images/auth/coming-soon-object3.png" alt="image" class="absolute right-0 top-0 h-[300px]" />
            <img src="/assets/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]" />
            <div
                class="relative w-full max-w-[870px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                <div class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 lg:min-h-[758px] py-20">
                    <div class="absolute top-6 end-6">
                        <div class="dropdown" x-data="dropdown" @click.outside="open = false">


                        </div>
                    </div>
                    <div x-data="form" class="mx-auto w-full max-w-[440px]">
                        <div class="mb-10">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl" style="color: #67152e; border-color: #ebba7d;"> Nouveau Rôle</h1>
                            <p class="text-base font-bold leading-normal text-white-dark">Renseigner le nom du privilège puis enrigistrer</p>
                        </div>
                        <form class="space-y-5 dark:text-white" id="formUtilisateur" @submit.prevent="submitForm3()" action="{{ route('roles.store') }}" method="POST">
    @csrf

    <!-- Champ Nom -->
    <div :class="[isSubmitForm3 ? (form3.name ? 'has-success' : 'has-error') : '']">
        <label for="name">Nom</label>
        <div class="relative text-white-dark">
            <input id="name" name="name" type="text" x-model="form3.name" placeholder="Entrez le nom du rôle" value="{{ old('name') }}" class="form-input ps-10 placeholder:text-white-dark" />
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <circle cx="9" cy="4.5" r="3" fill="#888EA8" />
                    <path opacity="0.5" d="M15 13.125C15 14.989 15 16.5 9 16.5C3 16.5 3 14.989 3 13.125C3 11.261 5.68629 9.75 9 9.75C12.3137 9.75 15 11.261 15 13.125Z" fill="#888EA8" />
                </svg>
            </span>
        </div>
    </div>

    <!-- Permissions -->
    <div>
        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Permissions</h2>
        @if($permissions->isNotEmpty())
            @foreach ($permissions as $permission)
                <div class="flex items-center space-x-4 mb-4">
                    <!-- Switch personnalisé -->
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" id="permission-{{ $permission->id }}" class="form-checkbox" name="permissions[]" value="{{ $permission->id }}" />
                        <span for="permission-{{ $permission->id }}" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
                    </label>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">Aucune permission disponible.</p>
        @endif
    </div>

    <!-- Bouton de soumission -->
    <div class="mt-10">
        <button type="submit" class="btn btn-primary flex items-center w-full" style="background-color: #67152e; border-color: #67152e; color: #fff;">
            Enregistrer
        </button>
    </div>
</form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                form3: {
                    name: ''

                },
                isSubmitForm3: false,
                submitForm3() {
                    this.isSubmitForm3 = true;

                    const { name} = this.form3;

                    if (name) {
                        this.showMessage('Le rôle a été créé avec succès..');

                        // Soumission vers Laravel
                        document.getElementById('formUtilisateur').submit();
                    } else {
                        this.showMessage('Merci de remplir tous les champs obligatoires.', 'error');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    </script>


</x-layout.default>
