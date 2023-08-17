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
            <span>Um sistema dedicado para colaboradores do grupo Chiaperini.</span>

        </div>


        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="login">
            @csrf

            <div class="grupo">
                <label for="email"> Email </label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="grupo">
                <label for="email"> Senha </label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>


            <div class="block mt-4 labelField forgotPassword">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
                </label>

                <div class="forgotPass">

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            Esqueceu sua senha?
                        </a>
                    @endif

                </div>
            </div>

            <div class="flex items-center justify-end mt-4 buttonField">


                <button class="btnSimples">
                   Acessar
                </button>

            </div>
        </form>

    </div>



</div>

@endsection