<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

        <h1 class="mb-3">Comments</h1>
        @error('newComment')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        @enderror

        <div class="">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
        </div>

    
        <form wire:submit.prevent="addComment">
            <div class="row my-3">
                <div class="col-lg-10">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="What's in your mind." wire:model.dbounce.500ms="newComment">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                </div>
            </div>
        </form>

        @foreach($comments as $comment)
        <div class="card my-3">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">{{ $comment->creator->name }}</h4>
                <i class="fas fa-times-circle text-danger" style="cursor: pointer;hover:" wire:click="remove({{ $comment->id }})"></i>
            </div>
            <div class="card-body">
                <p>{{ $comment->body }}</p>
            </div>
            <div class="card-footer">
                Created at : {{ $comment->created_at->diffForHumans() }}
            </div>
        </div>
        @endforeach

        {{ $comments->links('pagination-links') }}
        
</div>
