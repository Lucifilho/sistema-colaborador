@extends('layouts.guest')
@section('content')

<div class="login">

    <div class="conteudo">

        <div class="logo">

            <img src="imagens/logo.png">

        </div>

        <div class="link">

            <h3>Nosso Ramal</h3>
            <!-- span>É novo por aqui? <a href="" class="linkReg">Solicite um acesso<p></span -->
            <span>Faça parte do nosso sistema dedicado para colaboradores do grupo Chiaperini.</span>

        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="register">
            @csrf

            <div class="grupo">
                <label for="name"> Nome </label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="grupo">
                <label for="email"> Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="grupo">
                <label for="password">Senha </label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="grupo">
                <label for="password_confirmation"> Confirmar Senha </label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </label>
                </div>
            @endif

            <div class="fundo">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/login">
                    Já possui conta?
                </a>

                <button class="btnSimples">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
