<div class="content-right col-7">
    <div class="content-wrapper col-12">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="card email-app-details d-none d-lg-block">
                <div class="card-content">
                    @if($lastMessage)
                        <div class="email-app-options card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="btn-group" role="group"
                                         aria-label="Basic example">
                                        <button type="button"
                                                wire:click="repalyContact({{ $lastMessage->id }})"
                                                class="btn btn-sm btn-primary"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Replay"><i
                                                    class="la la-reply"></i></button>
                                        <button type="button"
                                                wire:click="$dispatch('ask-delete', {{ $lastMessage->id }})"
                                                class="btn btn-sm btn-outline-secondary"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Delete"><i
                                                    class="ft-trash-2"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 text-right">
                                    <div class="btn-group" role="group"
                                         aria-label="Basic example">
                                        <button type="button"
                                                class="btn btn-sm btn-outline-secondary"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Previous"><i
                                                    class="la la-angle-left"></i></button>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-secondary"
                                                data-toggle="tooltip"
                                                data-placement="top" data-original-title="Next">
                                            <i class="la la-angle-right"></i></button>
                                    </div>
                                    <div class="btn-group ml-1">
                                        <button type="button"
                                                class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">More
                                        </button>
                                        <div class="dropdown-menu">
                                            @if($lastMessage->is_read)
                                                <a class="dropdown-item"
                                                   wire:click.prevent="changeReadStatus({{ $lastMessage->id }})"
                                                   href="#">Mark
                                                    as unread</a>
                                            @else
                                                <a class="dropdown-item"
                                                   wire:click.prevent="changeReadStatus({{ $lastMessage->id }})"
                                                   href="#">Mark
                                                    as Read</a>
                                            @endif

                                            @if($lastMessage->spam)
                                                <a class="dropdown-item"
                                                   wire:click.prevent="changeSpamStatus({{ $lastMessage->id }})"
                                                   href="#">Mark
                                                    As unimportant</a>
                                            @else
                                                <a class="dropdown-item"
                                                   wire:click.prevent="changeSpamStatus({{ $lastMessage->id }})"
                                                   href="#">Mark
                                                    As important</a>
                                            @endif
                                            @if($lastMessage->star)
                                                <a class="dropdown-item"
                                                   wire:click.prevent="changeStarStatus({{ $lastMessage->id }})"
                                                   href="#">
                                                    Remove Form Star</a>
                                            @else
                                                <a class="dropdown-item"
                                                   wire:click.prevent="changeStarStatus({{ $lastMessage->id }})"
                                                   href="#">
                                                    Add To Star</a>
                                            @endif
                                            @if($lastMessage->deleted_at)
                                                <a class="dropdown-item"
                                                   wire:click.prevent="restoreContact({{ $lastMessage->id }})"
                                                   href="#">
                                                    Restore From Trash</a>
                                                @if($screen === 'trashed')
                                                    <a class="dropdown-item"
                                                       wire:click.prevent="forceDeleteMessage({{ $lastMessage->id }})"
                                                       href="#">
                                                        Delete For ever</a>

                                                @endif
                                            @else
                                                <a class="dropdown-item"
                                                   wire:click.prevent="forceDeleteMessage({{ $lastMessage->id }})"
                                                   href="#">
                                                    Delete For ever</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="email-app-title card-body">
                            <h3 class="list-group-item-heading">{{ __('dashboard.messages') }}</h3>
                            <p class="list-group-item-text">
                  <span class="primary">
                    <span class="badge badge-primary">{{ __('dashboard.message_form') }} {{ $lastMessage->name ?? '' }}</span> <i
                              class="float-right font-medium-3 ft-star warning"></i></span>
                            </p>
                        </div>
                        <div class="media-list">
                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
                                   aria-controls="collapse1"
                                   class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                      <span class="avatar avatar-md">
                        <img class="media-object rounded-circle"
                             src="{{ asset($lastMessage->user->image) }}"
                             alt="{{ $lastMessage->user->name }}">
                      </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading">{{ $lastMessage->user->name }}</h6>
                                        <p class="list-group-item-text text-primary">
                                            {{ $lastMessage->subject  }}
                                            <span class="float-right text-primary muted">{{ $lastMessage->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse1" role="tabpanel"
                                 aria-labelledby="headingCollapse1"
                                 class="card-collapse collapse"
                                 aria-expanded="true">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p>{{ $lastMessage->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
