@extends('admin.layouts.app')
@section('title', 'Admin - users')
@section('content-main')
<table class="min-w-full bg-white border border-gray-200" id="users-table">
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
                <a href="#" onclick="toggleStatus(event, '{{ $user->id }}')"
                    class="{{ $user->status === 'active' ? 'text-red-500' : 'text-green-500' }} hover:underline">
                    {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="m-2">
    {{ $users->links() }}
</div>

<script>
function toggleStatus(event, userId) {
    event.preventDefault();

    fetch(`/admin/users/${userId}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const link = event.target;
                link.textContent = data.new_text;
                link.className = data.new_class + ' hover:underline';

            }
        })
        .catch(error => console.error('Error:', error));
}
</script>
@endsection