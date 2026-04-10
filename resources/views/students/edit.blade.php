@extends('layouts.app')

@section('content')

<h2 class="text-white mb-4">Edit Student</h2>

<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">

    @csrf
    @method('PUT')

    {{-- NAME --}}
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- EMAIL --}}
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- PHONE --}}
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- ADDRESS --}}
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $student->address }}</textarea>
        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- GENDER --}}
    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- DOB --}}
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="dob" class="form-control" value="{{ $student->dob }}">
        @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- CURRENT IMAGE --}}
    @if($student->profile_image)
        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('uploads/images/' . $student->profile_image) }}" width="120">
        </div>
    @endif

    {{-- NEW IMAGE --}}
    <div class="mb-3">
        <label>Change Profile Image</label>
        <input type="file" name="profile_image" class="form-control">
        @error('profile_image') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- CURRENT FILE --}}
    @if($student->document_file)
        <div class="mb-3">
            <label>Current Document</label><br>
            <a href="{{ asset('uploads/docs/' . $student->document_file) }}" target="_blank">
                View File
            </a>
        </div>
    @endif

    {{-- NEW FILE --}}
    <div class="mb-3">
        <label>Change Document</label>
        <input type="file" name="document_file" class="form-control">
        @error('document_file') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- BUTTON --}}
    <button class="btn btn-primary w-100">Update Student</button>

</form>

@endsection