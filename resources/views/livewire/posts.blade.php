<div>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <h1>Title: "{{ $title }}"</h1>
    <h2>Author: {{ $author }}</h2>

    <div>
        <form>
            <label for="title">Title:</label>
         
            <input type="text" id="title" wire:model="title"> 
        </form>
    </div>

    <h2>List of Posts: </h2>
    <div>
        <table class="table table-border">
            <thead>
                <th>SN</th>
                <th>Title</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr wire:key="{{ $post->id }}"> 
                        <td>{{ $post->id ?? '' }}</td>
                        <td>{{ $post->title ?? ''  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($posts as $post)
            <div wire:key="{{ $post->id }}"> 
                
            </div>
        @endforeach
    </div>
</div>
