@extends('backend.app')

@section('title', 'social media')

@push('style')
    
@endpush

@section('content')
<div class="container mt-4 shadow-sm border rounded">
    <h2 class="mb-4 mt-2">Social Media Links</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Social Media Links Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col" style="color: white">Platform</th>
                    <th scope="col" style="color: white">Link</th>
                    <th scope="col" style="color: white">Status</th>
                    <th scope="col" style="color: white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socialMedia as $media)
                    <tr>
                        {{-- Update Form --}}
                        <form action="{{ route('social.media.update', $media->id) }}" method="POST" class="d-flex">
                            @csrf
                            @method('PUT')
                            <td class="align-middle">{{ ucfirst($media->platform) }}</td>
                            <td class="align-middle">
                                <input type="url" name="link" value="{{ $media->link }}" class="form-control" required>
                            </td>
                            <td class="align-middle">
                                <select name="status" class="form-select">
                                    <option value="active" {{ $media->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="deactive" {{ $media->status == 'deactive' ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </td>
                            <td class="align-middle">
                                <button type="submit" class="btn btn-primary btn-sm me-1">Update</button>
                                {{-- Delete Form --}}
                                {{-- <form action="{{ route('social.media.destroy', $media->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form> --}}
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
