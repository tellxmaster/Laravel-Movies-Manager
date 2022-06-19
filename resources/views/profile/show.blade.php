@extends('adminlte::page')
@section('title', 'Perfil')
@section('content')
    <div class="container">
        <div>
                @livewire('profile.update-profile-information-form')

                <div>
                    @livewire('profile.update-password-form')
                </div>

        </div>
    </div>
@endsection