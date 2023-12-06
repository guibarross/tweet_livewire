<div>
    <h1>Upload de Foto</h1>

    <form action="#" method="post" wire:submit.prevent="storagePhoto">
        <input type="file" wire:model="photo"><br>
        @error('photo')
            {{$message}}
        @enderror
        <button type="submit">Upload Foto</button>
    </form>

</div>
