@extends('layouts.dashboard.app')

@session('title')
Roles
@endsession

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Basic Forms</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Hoverable rows start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('dashboard.roles') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.roles') }}</th>
                                    <th>{{ __('dashboard.permissions') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary "
                                                    data-toggle="modal"
                                                    data-target="#bounceInDown_{{ $role->id  }}">
                                                {{ __('dashboard.show_permission') }}
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal animated bounceInDown text-left" id="bounceInDown_{{ $role->id }}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel47" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"
                                                                id="myModalLabel47">{{ __('dashboard.permissions') }}</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @foreach($role->permissions as $permission)

                                                                    @if(app()->getLocale() === 'ar')

                                                                        @foreach(config('permissions_ar') as $key => $value)
                                                                            @if($permission === $key)
                                                                                <div class="col-4 mb-2">
                                                                               <span class="badge bg-primary rounded-pill w-100 py-2 text-center"
                                                                                     style="font-size: 14px;">
                                                                                 {{ $value }}
                                                                               </span>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <div class="col-4 mb-2">
                                                                            <span class="badge bg-primary rounded-pill w-100 py-2 text-center"
                                                                                  style="font-size: 14px;">
                                                                                {{ $permission }}
                                                                            </span>
                                                                        </div>
                                                                    @endif

                                                                @endforeach
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <button class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                    id="dropdownBreadcrumbButton"
                                                    type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">{{ __('dashboard.actions') }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                                                <a class="dropdown-item"
                                                   href="{{ route('dashboard.roles.edit', $role->id) }}"><i
                                                            class="la la-edit"></i> {{ __('dashboard.edit.role') }}</a>
                                                <a class="dropdown-item delete-btn" href="javascript:void(0)"
                                                   data-id="{{ $role->id }}"><i
                                                            class="la la-trash"></i> {{ __('dashboard.delete') }}</a>

                                                <form id="delete_{{ $role->id }}"
                                                      action="{{ route('dashboard.roles.destroy', $role->id) }}"
                                                      method="POST" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $roles->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hoverable rows end -->
    </div>
@endsection

@include('incloudes.sweet-delete')
