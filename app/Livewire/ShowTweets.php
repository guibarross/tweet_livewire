<?php

namespace App\Livewire;

use App\Models\Tweet;
use Illuminate\Mail\Mailables\Content;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = "Teste";

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(2);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => 1,
        ]);

        $this->content = "";
    }
}
