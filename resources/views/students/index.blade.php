@extends('layouts.app')

@section('content')

<h2 class="text-white mb-4">Student Dashboard</h2>

<a href="{{ route('students.create') }}" class="btn btn-success mb-3">
    + Add Student
</a>

@if($students->isEmpty())

    <div class="alert alert-warning">No students found.</div>

@else

    <div class="row">
        @foreach ($students as $student)

            <div class="col-md-4">
                <div class="card mb-4 shadow">

                    <div class="card-body">

                        <h5 class="card-title text-primary">{{ $student->name }}</h5>

                        <p><b>Email:</b> {{ $student->email }}</p>
                        <p><b>Phone:</b> {{ $student->phone }}</p>
                        <p><b>Gender:</b> {{ $student->gender }}</p>
                        <p><b>DOB:</b> {{ $student->dob }}</p>
                        <p><b>Address:</b> {{ $student->address }}</p>

                        {{-- IMAGE --}}
                        @if($student->profile_image)
                            <img src="{{ asset('uploads/images/' . $student->profile_image) }}"
                                 width="100%" height="150" style="object-fit:cover;">
                        @endif

                        {{-- DOCUMENT --}}
                        @if($student->document_file)
                            <br><br>
                            <a href="{{ asset('uploads/docs/' . $student->document_file) }}"
                               target="_blank"
                               class="btn btn-info btn-sm">
                               View Document
                            </a>
                        @endif

                        <hr>

                        <a href="{{ route('students.edit', $student->id) }}"
                           class="btn btn-primary btn-sm">
                           Edit
                        </a>

                        <form action="{{ route('students.destroy', $student->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Delete this student?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        @endforeach
    </div>

@endif

@endsection