@extends('dashboard')
@section('content')
<main class="contact-detail">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Contact Details</h3>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID:</td>
                                    <td>{{$contactDetail->id}}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{$contactDetail->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{$contactDetail->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td>{{$contactDetail->phone}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('contactList')}}" class="btn btn-secondary">Return</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection