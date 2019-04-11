@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    Olá, {{ $client->name }} !
                    <br>
                    <br>
                    Obrigado por registrar-se conosco no site da ???????? com este e-mail, estamos enviando essa mensagem apenas para que você possa concluir o seu cadastro.
                    <br>
                    <br>
                    Por favor, copie o código de verificação: <b>{{ $verification_code }}<b> 
                    <br>
                    <br>
                    Caso você não tenha realizado este cadastro, favor desconsiderar este e-mail.
                    <br/>
                    <br/>
                    Atenciosamente,
                    Equipe ????????
                </div>
            </div>
        </div>
    </div>
@endsection
