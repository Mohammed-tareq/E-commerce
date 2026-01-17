<div class="email-app-menu col-md-8 card d-none mx-1 d-lg-block">
    <div class="form-group form-group-compose text-center">

        <button type="button"
                class="btn btn-danger btn-block my-1 dropdown-toggle"
                data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i
                    class="ft-mail mx-1"></i>Compose
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" wire:click.prevent="markAllAsRead" href="#">Mark All as Read</a>
            <a class="dropdown-item" wire:click.prevent="deleteAllSpam" href="#">Delete All Spam</a>
            <a class="dropdown-item" wire:click.prevent="deleteAllTrash" href="#">Delete All Trash</a>
        </div>
    </div>
    <h6 class="text-muted text-bold-500 mb-1">{{ __('dashboard.messages') }}</h6>
    <div class="list-group list-group-messages">
        <a wire:click="getScreen('index')"
           href="#" class="list-group-item @if($screen === 'index') active @endif  border-0">
            <i class="ft-inbox mr-1"></i> Inbox
            <span class="badge badge-secondary badge-pill float-right">{{ $inboxCount }}</span>
        </a>
        <a wire:click="getScreen('readed')"
           href="#" class="list-group-item @if($screen === 'readed') active @endif border-0">
            <i class="ft-inbox mr-1"></i> Readed
            <span class="badge badge-secondary badge-pill float-right">{{ $readedCount }}</span>
        </a>
        <a wire:click="getScreen('answered')"
           href="#" class="list-group-item @if($screen === 'answered') active @endif border-0">
            <i class="ft-inbox mr-1"></i> Answered
            <span class="badge badge-secondary badge-pill float-right">{{ $replayedCount }}</span>
        </a>
        <a wire:click="getScreen('stared')"
           href="#" class="list-group-item @if($screen === 'stared') active @endif border-0">
            <i class="ft-inbox mr-1"></i> Starred
            <span class="badge badge-secondary badge-pill float-right">{{ $starCount }}</span>
        </a>
        <a wire:click="getScreen('spamed')"
           href="#" class="list-group-item @if($screen === 'spamed') active @endif border-0">
            <i class="ft-inbox mr-1"></i> Spam
            <span class="badge badge-secondary badge-pill float-right">{{ $spamCount }}</span>
        </a>
        <a wire:click="getScreen('trashed')"
           href="#" class="list-group-item @if($screen === 'trashed') active @endif border-0">
            <i class="ft-inbox mr-1"></i> Trash
            <span class="badge badge-secondary badge-pill float-right">{{ $trashedCount }}</span>
        </a>

    </div>

</div>
