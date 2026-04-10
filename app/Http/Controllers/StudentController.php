<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    // ✅ SHOW ALL DATA
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // ✅ SHOW CREATE FORM
    public function create()
    {
        return view('students.create');
    }

    // ✅ STORE DATA (CREATE)
    public function store(Request $request)
    {
        // 🔥 VALIDATION
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|min:11|max:15',
            'address' => 'required|min:5',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'document_file' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        // 📸 IMAGE UPLOAD
        $imageName = null;
        if ($request->hasFile('profile_image')) {
            $imageName = time().'_'.$request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(public_path('uploads/images'), $imageName);
        }

        // 📄 DOCUMENT UPLOAD
        $docName = null;
        if ($request->hasFile('document_file')) {
            $docName = time().'_'.$request->file('document_file')->getClientOriginalName();
            $request->file('document_file')->move(public_path('uploads/docs'), $docName);
        }

        // 💾 SAVE DATA
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'profile_image' => $imageName,
            'document_file' => $docName
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // ✅ EDIT FORM
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // ✅ UPDATE DATA
    public function update(Request $request, Student $student)
    {
        // 🔥 VALIDATION
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|min:11|max:15',
            'address' => 'required|min:5',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'document_file' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ]);

        // 📸 IMAGE UPDATE
        if ($request->hasFile('profile_image')) {
            $imageName = time().'_'.$request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(public_path('uploads/images'), $imageName);
            $student->profile_image = $imageName;
        }

        // 📄 DOCUMENT UPDATE
        if ($request->hasFile('document_file')) {
            $docName = time().'_'.$request->file('document_file')->getClientOriginalName();
            $request->file('document_file')->move(public_path('uploads/docs'), $docName);
            $student->document_file = $docName;
        }

        // 💾 UPDATE DATA
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // ✅ DELETE
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}