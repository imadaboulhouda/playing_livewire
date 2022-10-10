<div>

    <a href="#" wire:click="toggleAdds">Add</a>
    @if ($toggleAdd)
        <form action="" wire:submit.prevent="add">
            <div>
                <label for="">tITLE</label>
                <input type="text" wire:model="post.title" id="">
            </div>

            <div>
                <label for="">Description</label>
                <input type="text" wire:model="post.description" id="">
            </div>

            <button type="submit">Add</button>

        </form>
    @endif
    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Description</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->description }}</td>
                    <td>
                        <a href="#" wire:click="edit({{ $p->id }})">Edit</a>
                    </td>
                </tr>
                @if (isset($post['id']) && $post['id'] > 0 && $post['id'] == $p->id)
                    <tr wire:key="{{ $p->id }}">
                        <td colspan="3">
                            <form wire:submit.prevent="save">
                                <input type="text" wire:model="post.title" />
                                @error('post.title')
                                    <p>{{ $message }}</p>
                                @enderror

                                <input type="text" wire:model="post.description" />
                                @error('post.description')
                                    <p>{{ $message }}</p>
                                @enderror
                                <button>Save</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>


</div>
