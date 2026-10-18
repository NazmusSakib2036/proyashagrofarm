@extends('layouts.admin')

@section('title','Concerns')

@section('content')
<div class="admin-page-header is-right-justified" style="margin-bottom: 1rem;">
    <a href="{{ route('admin.concerns.create') }}" class="btn-primary">Add Concern</a>
</div>
<table>
    <thead>
        <tr><th>Name</th><th>Sort</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach($concerns as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.concerns.edit',$c) }}">Edit</a> |
                    <form method="POST" action="{{ route('admin.concerns.destroy',$c) }}" style="display:inline">@csrf @method('DELETE')<button type="submit">Delete</button></form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
