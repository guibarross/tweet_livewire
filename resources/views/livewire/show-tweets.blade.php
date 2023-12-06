

<div>
    Show Tweets

    <p>{{ $content }}</p>

    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content" wire:model.live="content">
        @error('content')
            {{ $message }}
        @enderror
        <button type="submit">Tweetar</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
    <div>
        <div>
            @if ($tweet->user->photo)
                <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}" style="width:30px">
            @else
                <img src="{{ url('imgs/no-image.png') }}" alt="{{ $tweet->user->name }}" style="width:30px">
            @endif
            {{ $tweet->user->name }} 
        </div>

        <div>
            {{ $tweet->content }}
            @if ($tweet->likes->count())
                <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
            @else
                <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
            @endif
        </div>
        </div>
        <br>

    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>

</div>
