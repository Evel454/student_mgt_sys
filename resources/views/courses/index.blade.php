@extends('layouts.page')

@section('page')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Courses</h1>
    @if (auth()->user()->can('manage courses'))
        <a href="{{ route('courses.create') }}" class="px-4 py-2 bg-[#2563eb] text-white rounded-lg text-sm font-semibold">Add course</a>
    @endif
</div>

<div class="overflow-x-auto border border-slate-200 rounded-xl">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="p-3">Code</th>
                <th class="p-3">Title</th>
                <th class="p-3">Credit units</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $c)
            <tr class="border-t border-slate-200">
                <td class="p-3">{{ $c->course_code }}</td>
                <td class="p-3">{{ $c->title }}</td>
                <td class="p-3">{{ $c->credit_units }}</td>
                <td class="p-3">
                    <div class="flex flex-wrap items-center gap-3">

                        @if (auth()->user()->can('register for course'))
                            <form method="POST" action="{{ route('courses.register', $c) }}" class="flex items-center gap-2">
                                @csrf
                                <input name="academic_year" value="2026/2027" size="9" required
                                       class="border border-slate-300 rounded px-2 py-1">
                                <select name="semester" class="border border-slate-300 rounded px-2 py-1">
                                    <option value="1">Sem 1</option>
                                    <option value="2">Sem 2</option>
                                </select>
                                <button class="px-3 py-1 bg-[#d97706] text-white rounded">Register</button>
                            </form>
                        @endif

                        @if (auth()->user()->can('manage courses'))
                            <a href="{{ route('courses.edit', $c) }}" class="text-[#2563eb]">Edit</a>
                            <form method="POST" action="{{ route('courses.destroy', $c) }}"
                                  onsubmit="return confirm('Delete this course?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Delete</button>
                            </form>
                        @endif

                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-4 text-slate-500">No courses yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $courses->links() }}</div>
@endsection
