@extends('layouts.page')

@section('page')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Students</h1>
    @if (auth()->user()->can('manage students'))
        <a href="{{ route('students.create') }}" class="px-4 py-2 bg-[#2563eb] text-white rounded-lg text-sm font-semibold">Add student</a>
    @endif
</div>

<div class="overflow-x-auto border border-slate-200 rounded-xl">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="p-3">Reg No</th>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Programme</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $s)
            <tr class="border-t border-slate-200">
                <td class="p-3">{{ $s->registration_number }}</td>
                <td class="p-3">{{ $s->first_name }} {{ $s->last_name }}</td>
                <td class="p-3">{{ $s->email }}</td>
                <td class="p-3">{{ $s->programme }}</td>
                <td class="p-3">
                    <div class="flex items-center gap-3">
                        @if (auth()->user()->can('manage students'))
                            <a href="{{ route('students.edit', $s) }}" class="text-[#2563eb]">Edit</a>
                            <form method="POST" action="{{ route('students.destroy', $s) }}" onsubmit="return confirm('Delete this student?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Delete</button>
                            </form>
                        @endif
                        <a href="{{ route('students.courses', $s) }}" class="text-slate-600">Courses</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-slate-500">No students yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $students->links() }}</div>
@endsection