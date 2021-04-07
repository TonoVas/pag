@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                <table class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                                            <th scope="col">URL</th>
                                            <th scope="col">Codigo de verificación</th>
                    </thead>
                    <tbody>
                        @foreach ($dato as $dato)
                    <tr>
                    <td><a href="{{ url('verificacion/'.$dato->name.'/es') }}" style="text-decoration: none">{{ ('verificacion/'.$dato->name.'/es') }}</a></td>
                    <td>{{$dato->password_code}}</td>
                </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
