@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center text-primary">Add New Student</h2>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone" value="{{ old('phone') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Profile Image</label>
                    <input type="file" name="profile_image" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Document File (PDF/DOC)</label>
                    <input type="file" name="document_file" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter address">{{ old('address') }}</textarea>
                </div>

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Save Student</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
            </div>

        </form>
    </div>
</div>

@endsection