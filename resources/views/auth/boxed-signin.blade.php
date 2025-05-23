<x-layout.auth>

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <div class="mx-auto w-full max-w-[440px]">
                        <div class="mb-10">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">Connexion</h1>
                            <p class="text-base font-bold leading-normal text-white-dark">Connectez-vous avec votre e-mail et mot de passe</p>
                        </div>
                        <form x-data="form" class="space-y-5 dark:text-white" id="formUtilisateur" @submit.prevent="submitForm3()"   action="{{ route('login-token') }} method="POST">

                        {{-- <form  class="space-y-5 dark:text-white "  id="formUtilisateur" @submit.prevent="submitForm3()" action="{{ route('login-token') }}"  method="POST"> --}}
                            @csrf



                            <div :class="[isSubmitForm3 ? (form3.email ? 'has-success' : 'has-error') : '']">
                                <label for="email">Email</label>
                                <div class="relative text-white-dark">
                                    <input id="email" name="email"  type="email" x-model="form3.email" placeholder="entrez l'email'" class="form-input ps-10 placeholder:text-white-dark" />
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                              @enderror
                                    <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z"
                                                fill="currentColor" />
                                            <path
                                                d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div  :class="[isSubmitForm3 ? (form3.select ? 'has-success' : 'has-error') : '']">
                                <label for="password">Password</label>
                                <div class="relative text-white-dark">
                                    <input id="password" type="password" name="password"  x-model="form3.password" placeholder="entrez le mot de passe" class="form-input ps-10 placeholder:text-white-dark" />
                                    @error('Password')
                                    <div class="text-danger">{{ $message }}</div>
                                              @enderror
                                    <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                d="M1.5 12C1.5 9.87868 1.5 8.81802 2.15901 8.15901C2.81802 7.5 3.87868 7.5 6 7.5H12C14.1213 7.5 15.182 7.5 15.841 8.15901C16.5 8.81802 16.5 9.87868 16.5 12C16.5 14.1213 16.5 15.182 15.841 15.841C15.182 16.5 14.1213 16.5 12 16.5H6C3.87868 16.5 2.81802 16.5 2.15901 15.841C1.5 15.182 1.5 14.1213 1.5 12Z"
                                                fill="currentColor" />
                                            <path d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z" fill="currentColor" />
                                            <path d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z" fill="currentColor" />
                                            <path d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z" fill="currentColor" />
                                            <path
                                                d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V7.50268C13.363 7.50665 13.7351 7.51651 14.0625 7.54096V6C14.0625 3.20406 11.7959 0.9375 9 0.9375C6.20406 0.9375 3.9375 3.20406 3.9375 6V7.54096C4.26488 7.51651 4.63698 7.50665 5.0625 7.50268V6Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]"> Se connecter</button>
                        </form>

                        <div class="text-center dark:text-white"> Already have an account ? <a href="/auth/boxed-signin" class="uppercase text-primary underline transition hover:text-black dark:hover:text-white">SIGN IN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    document.addEventListener("alpine:init", () => {
        Alpine.data("form", () => ({
            form3: {
                email: '',
                password: ''
            },
            isSubmitForm3: false,
            submitForm3() {
                this.isSubmitForm3 = true;
                const { email, password } = this.form3;

                if (email && password) {
                  fetch('/api/auth/login-token', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ email, password })
})
.then(response => {
    if (!response.ok) {
        // Vérifiez si la réponse est en JSON ou en HTML
        const contentType = response.headers.get("content-type");
        if (contentType && contentType.includes("application/json")) {
            return response.json().then(err => Promise.reject(err));
        } else {
            return Promise.reject({ message: "Une erreur inattendue s'est produite." });
        }
    }
    return response.json();
})
.then(data => {
    localStorage.setItem('token', data.access_token);
    this.showMessage('Connexion réussie.');
    window.location.href = '/dashboard';
})
.catch(error => {
    this.showMessage(error.message || 'Erreur de connexion.', 'error');
});

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


</x-layout.auth>
