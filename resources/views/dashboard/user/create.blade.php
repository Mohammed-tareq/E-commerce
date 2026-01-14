<div class="modal fade overflow-auto" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">{{ __('dashboard.create_user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none" id="error-block">
                    <ul id="error-list">
                    </ul>
                </div>

                <form id="create-user-form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('dashboard.name') }}</label>
                                <input type="text" class="form-control" id="name"
                                       placeholder="{{ __('placeHolder.name') }}" name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="discount_percentage">{{ __('dashboard.email') }}</label>
                                <input type="text" class="form-control" id="discount_percentage"
                                       placeholder="{{ __('placeHolder.email') }}"
                                       name="email">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">{{ __('dashboard.phone') }}</label>
                                <input type="text" class="form-control" id="phone"
                                       placeholder="{{ __('placeHolder.phone') }}" name="phone">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">{{ __('dashboard.password') }}</label>
                                <input type="password" class="form-control" id="password"
                                       placeholder="{{ __('dashboard.password') }}" name="password">

                            </div>
                        </div>
                        <div class="col-md-12">
                           @livewire('general.address-drop-down')
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <p><label>{{ __('dashboard.status') }}</label></p>
                                <input type="radio" id="status_active" name="status" value="1">
                                <label for="status_active">{{ __('dashboard.Active') }}</label>
                                <input type="radio" id="status_inactive" name="status" value="0"> <label
                                        for="status_inactive">{{ __('dashboard.Inactive') }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('dashboard.create') }}</button>
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ __('dashboard.close') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








