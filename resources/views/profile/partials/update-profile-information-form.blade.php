<section>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Nombre') }}</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name', $user->name) }}" 
                    required 
                    autofocus 
                    autocomplete="name">
                @error('name')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email', $user->email) }}" 
                    required 
                    autocomplete="username">
                @error('email')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3">
                        <p class="text-sm text-muted">
                            {{ __('Tu dirección de email no ha sido verificada.') }}
                            <button form="send-verification" class="btn btn-link p-0 text-decoration-none">
                                {{ __('Clic aquí para enviar una solicitud de verificación a tu email.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success mt-2">
                                {{ __('Un nuevo link de verificación ha sido enviado a tu email.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Botón Guardar -->
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-info">{{ __('Guardar') }}</button>
                @if (session('status') === 'profile-updated')
                    <p 
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-success mb-0">
                        {{ __('Guardado') }}
                    </p>
                @endif
            </div>
        </form>
</section>
