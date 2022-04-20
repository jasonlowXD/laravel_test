@extends('dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5 col-md-5 col-sm-11">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="d-flex justify-content-between">
            <h4>Contact List</h4>
            <a href="{{ route('addContactPage')}}" class="btn btn-primary">Add new contact</a>
        </div>

        <div class="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactList as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('contactDetailPage',$contact->id)}}" class="btn btn-success">View</a>
                            <a href="{{ route('editContactPage',$contact->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('deleteContact', $contact->id)}}" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection