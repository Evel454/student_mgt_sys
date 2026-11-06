@php $s = $student ?? null; @endphp
<div class="grid gap-4 max-w-xl">
    <label class="block text-sm">First name
        <input name="first_name" value="{{ old('first_name', $s->first_name ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
    </label>
    <label class="block text-sm">Last name
        <input name="last_name" value="{{ old('last_name', $s->last_name ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
    </label>
    <label class="block text-sm">Registration number
        <input name="registration_number" value="{{ old('registration_number', $s->registration_number ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
    </label>
    <label class="block text-sm">Email
        <input type="email" name="email" value="{{ old('email', $s->email ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
    </label>
    <label class="block text-sm">Programme
        <input name="programme" value="{{ old('programme', $s->programme ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
    </label>
    <div class="flex gap-3">
        <button type="submit" class="px-5 py-2 bg-[#2563eb] text-white rounded-lg text-sm font-semibold">Save</button>
        <a href="{{ route('students.index') }}" class="px-5 py-2 border border-slate-300 rounded-lg text-sm">Cancel</a>
    </div>
</div>
