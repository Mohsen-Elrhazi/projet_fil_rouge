@extends('dashboard.admin.layouts.app')

@section('title', 'users')

@section('content')
<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr>
            <th
                class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                ID</th>
            <th
                class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Name</th>
            <th
                class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Email</th>
            <th
                class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $user->id }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $user->name }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $user->email }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">
                @if($user->status === 'active')
                <a href="{{ url("admin/users/{$user->id}") }}" class="text-red-500 hover:underline">Deactivate</a>
                @else
                <a href="{{ url("admin/users/{$user->id}") }}" class="text-green-500 hover:underline">Activate</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $users->links() }}
</div>

@endsection