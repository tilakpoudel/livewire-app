<div class="m-4">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session('message') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  
    @if($updateMode)
        @include('livewire.edit-post')
    @else
        @include('livewire.create-post')
    @endif
  
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post['id'] ?? '' }}</td>
                <td>{{ $post['title'] ?? '' }}</td>
                <td>{{ $post['body'] ?? '' }}</td>
                <td>
                <button wire:click="edit({{ $post['id'] }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $post['id'] }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
