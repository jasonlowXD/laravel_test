@extends('dashboard')
@section('content')
<main class="add-contact-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Add Contact</h3>
                    <div class="card-body">
                        <form action="{{ route('add-contact') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name" required autofocus>
                             </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone" required>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('contactList')}}" class="btn btn-secondary">Return</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection