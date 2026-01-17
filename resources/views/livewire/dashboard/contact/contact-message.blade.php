<div class="email-app-list-wraper col-md-12 card p-0">
    <div class="email-app-list">
        <div class="card-body chat-fixed-search">
            <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                <input type="text" class="form-control" id="iconLeft4" wire:model.live="itemSearch"
                       placeholder="Search email">
                <div class="form-control-position">
                    <i class="ft-search"></i>
                </div>
            </fieldset>
        </div>
        <div id="users-list" class="list-group">
            <div class="users-list-padding media-list">
                @forelse($messages as $msg)
                    <a href="#"
                       wire:key="message-{{ $msg->id }}"
                       @if($screen === 'trashed')
                           wire:click.debounce="showDeletedMessage({{ $msg->id }})"
                       @else
                           wire:click="showMessage({{ $msg->id }})"
                       @endif
                       class="media border-0"
                       style="background-color: {{ $messageSelected == $msg->id ? '#D3DCED' : '' }}">
                        <div class="media-left pr-1">
                      <span class="avatar avatar-md">
                        <span class="media-object rounded-circle text-circle bg-info">{{ $msg->user->image }}</span>
                      </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading text-bold-500">
                                {{ substr($msg->user->email,0,20) }}...
                                <span class="float-right">
                          <span class="font-small-2 primary">{{ $msg->created_at->diffForHumans() }}</span>
                        </span>
                            </h6>
                            <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                                {{substr($msg->subject,0,20) }}...</p>
                            <p class="list-group-item-text mb-0">
                                {{ substr($msg->message,0,20) }}...
                                @if(!$msg->is_read)
                                    <span class="float-right  badge badge-danger">
                                       New Contact</span>
                                @else
                                    <span class="float-right  badge badge-success">
                                      Readed</span>
                                @endif
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="text-center">
                        no message yet
                    </div>
                @endforelse
                <div class="text-center mx-4">
                    {{ $messages->links('vendor.livewire.simple-bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>