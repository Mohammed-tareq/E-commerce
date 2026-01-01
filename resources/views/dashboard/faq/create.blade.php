<div class="modal fade overflow-auto" id="createFaqModal" tabindex="-1" aria-labelledby="createFaqModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFaqModalLabel">{{ __('dashboard.create_faq') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none" id="error-block">
                    <ul id="error-list">
                    </ul>
                </div>

                <form id="create-faq-form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="question-en">{{ __('dashboard.question') }}</label>
                                <input type="text" class="form-control" id="question-en"
                                       placeholder="{{ __('dashboard.question_en') }}" name="question[en]" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="question-ar">{{ __('dashboard.question') }}</label>
                                <input type="text" class="form-control" id="question-ar"
                                       placeholder="{{ __('dashboard.question_ar') }}" name="question[ar]" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="answer-en">{{ __('dashboard.answer') }}</label>
                                <textarea class="form-control" id="answer-en"
                                          placeholder="{{ __('dashboard.answer_en') }}" name="answer[en]" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="answer-ar">{{ __('dashboard.answer') }}</label>
                                <textarea class="form-control" id="answer-ar"
                                          placeholder="{{ __('dashboard.answer_ar') }}" name="answer[ar]" required></textarea>
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








