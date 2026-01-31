<section id="icon-tabs">
    @if (!empty($successMessage) && $currentStep == 1)
        <div id="successMessageWire" class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
             role="alert">
            <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ $successMessage }}!</strong>
        </div>
    @endif

    <ul class="wizard-timeline center-align">
        <li class="{{ $currentStep > 1 ? 'completed' : '' }}">
            <span class="step-num">1</span>
            <label>{{ __('dashboard.basic_information') }}</label>
        </li>
        <li class="{{ $currentStep > 2 ? 'completed' : '' }}">
            <span class="step-num">2</span>
            <label>{{ __('dashboard.product_variants') }}</label>
        </li>
        <li class="active {{ $currentStep > 3 ? 'completed' : '' }}">
            <span class="step-num">3</span>
            <label>{{ __('dashboard.product_images') }}</label>
        </li>
        <li class="{{ $currentStep == 4 ? 'completed' : '' }}">
            <span class="step-num">4</span>
            <label>{{ __('dashboard.confirmation') }}</label>
        </li>
    </ul>

    <form class="wizard-circle">

        {{-- first step Product Basic Info --}}
        <div class="setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
            <h3> Step 1</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name_ar"> {{ __('dashboard.product_ar') }} :</label>
                        <input wire:model="name_ar" type="text" class="form-control" id="name_ar"
                               placeholder="{{ __('dashboard.product_ar') }}">
                        @error('name_ar')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name_en"> {{ __('dashboard.product_en') }} :</label>
                        <input wire:model="name_en" type="text" class="form-control" id="name_en"
                               placeholder="{{ __('dashboard.product_en') }}">
                        @error('name_en')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="small_desc_ar"> {{ __('dashboard.small_desc_ar') }}
                            :</label>
                        <textarea wire:model="small_desc_ar" class="form-control" id="small_desc_ar"></textarea>
                        @error('small_desc_ar')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="small_desc_en"> {{ __('dashboard.small_desc_en') }}
                            :</label>
                        <textarea wire:model="small_desc_en" class="form-control" id="small_desc_en"></textarea>
                        @error('small_desc_en')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc_ar"> {{ __('dashboard.desc_ar') }} :</label>
                        <textarea wire:model="desc_ar" class="form-control" id="desc_ar"></textarea>
                        @error('desc_ar')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc_en"> {{ __('dashboard.desc_en') }} :</label>
                        <textarea wire:model="desc_en" class="form-control" id="desc_en"></textarea>
                        @error('desc_en')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category"> {{ __('dashboard.categories') }} :</label>
                        <select wire:model="category_id" class="form-control custom-select" id="category">
                            <option value=""> {{ __('dashboard.select_category') }} </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand"> {{ __('dashboard.brands') }} :</label>
                        <select wire:model="brand_id" class="form-control custom-select" id="brand">
                            <option value=""> {{ __('dashboard.select_brand') }} </option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="available_for"> {{ __('dashboard.available_for') }} :</label>
                        <input wire:model="available_for" type="date" class="form-control" id="available_for">
                        @error('available_for')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="tags"> {{ __('dashboard.tags') }} :</label>--}}
{{--                        <input type="text" wire:model="tags" id="tags" class="form-control"--}}
{{--                               placeholder="Add tags">--}}
{{--                        @error('tags')--}}
{{--                        <span class="text-danger" role="alert">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <button class="btn btn-primary pull-right mb-3" wire:click="fristStep"
                    type="button">{{ __('dashboard.next') }}</button>
        </div>

        {{-- second step Product Variants? --}}
        <div class="setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            {{-- Basic --}}
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="has_variants"> {{ __('dashboard.has_variants') }} :</label>
                        <select name="has_variants" id="has_variants" wire:model.live="has_variants"
                                class="form-control">
                            <option value="0" selected>{{ __('dashboard.no') }}</option>
                            <option value="1">{{ __('dashboard.yes') }}</option>
                        </select>
                        @error('has_variants')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($has_variants == 0)
                    <div class="col-6">
                        <div class="form-group">
                            <label for="price">{{ __('dashboard.price') }} :</label>
                            <input type="number" class="form-control" name="price" id="price"
                                   wire:model="price" placeholder="{{ __('dashboard.price') }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="quantity">{{ __('dashboard.manage_stock') }} :</label>
                            <select name="manage_stock" id="status" class="form-control"
                                    wire:model.live="manage_stock">
                                <option value="0" selected>{{ __('dashboard.no') }}</option>
                                <option value="1">{{ __('dashboard.yes') }}</option>
                            </select>
                            @error('manage_stock')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @else
                    <input type="hidden" wire:model.live="manage_stock" value="0">
                @endif



                {{-- depend on Manage stock --}}
                @if ($manage_stock == 1)
                    <div class="col-6">
                        <div class="form-group">
                            <label for="qty">{{ __('dashboard.qty') }} :</label>
                            <input type="number" class="form-control" name="qty" id="qty"
                                   wire:model="qty" placeholder="{{ __('dashboard.qty') }}">
                            @error('qty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif

                {{-- edit this part --}}
                <div class="col-6">
                    <div class="form-group">
                        <label for="status">{{ __('dashboard.has_discount') }} :</label>
                        <select name="status" id="status" class="form-control" wire:model.live="has_discount">
                            <option value="0" selected>{{ __('dashboard.no') }}</option>
                            <option value="1">{{ __('dashboard.yes') }}</option>
                        </select>
                        @error('has_discount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($has_discount == 1)
                    {{-- depend on has discount --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label for="discount">{{ __('dashboard.discount') }}</label>
                            <input class="form-control" type="number" wire:model.live="discount"
                                   placeholder="{{ __('dashboard.discount') }}">
                            @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="start_discount">{{ __('dashboard.discount_start') }}</label>
                            <input type="date" wire:model.live="discount_start" class="form-control"
                                   placeholder="{{ __('dashboard.discount_start') }}">
                            @error('discount_start')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="end_discount">{{ __('dashboard.discount_end') }}</label>
                            <input type="date" wire:model.live="discount_end" class="form-control"
                                   placeholder="{{ __('dashboard.discount_end') }}">
                            @error('discount_end')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif


            </div>
            {{-- has variants--}}
            @if ($has_variants == 1)
                <hr class="bg-black">

                @for ($i = 0; $i < $addRowValues; $i++)
                    <div class="row">
                        <hr>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input wire:model="prices.{{ $i }}" type="number" class="form-control"
                                       placeholder="Product Price">
                                @error('prices.' . $i)
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="price">Product Quantity</label>
                                <input wire:model="quantities.{{ $i }}" type="number"
                                       class="form-control" placeholder="Product Quantity">
                                @error('quantities.' . $i)
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @foreach ($attributesItem as $attr)
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="price">Product {{ $attr->name }}</label>
                                    <select wire:model="attributeValues.{{ $i }}.{{ $attr->id }}"
                                            class="form-control">
                                        <option value="" selected>Select</option>

                                        @foreach ($attr->attributeValues as $item)
                                            <option value="{{ $item->id }}">{{ $item->value }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <hr class="bg-black">
                @endfor

                <button type="button" wire:click="addNewVariant" class="btn btn-success"><i class="la la-plus"></i>
                    Add New Variant
                </button>
                @if($addRowValues > 1)
                    <button type="button" wire:click="removeVariant" class="btn btn-danger"><i class="la la-minus"></i>
                        Remove Variant
                    </button>
                @endif
            @endif


            <button class="btn btn-primary pull-right  mb-3 ml-1" type="button"
                    wire:click="secondStep">{{ __('dashboard.next') }}</button>
            <button class="btn btn-danger  pull-right" type="button"
                    wire:click="backStep">{{ __('dashboard.back') }}</button>
        </div>

        {{-- third step Product Images --}}
        <div class="setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="images"> {{ __('dashboard.product_images') }} :</label>
                        <input type="file" wire:model.live="images" class="form-control" multiple>
                    </div>
                </div>
                @error('images')
                <div class="col-md-12 alert  alert-danger">
                    {{ $message }}
                </div>
                @enderror

                @if ($images)
                    <div class="col-md-12">
                        @foreach ($images as $key => $image)
                            <div class="position-relative d-inline-block mr-2 mb-2">
                                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail rounded-md"
                                     width="200px" height="200px">
                                {{--  Delete Button --}}
                                <button type="button" wire:click="deleteImage({{ $key }})"
                                        class="btn btn-danger btn-sm position-absolute" style="top: 5px; right: 5px;">
                                    <i class="la la-trash"></i>
                                </button>

                                {{--  Fullscreen Button --}}
                                <button type="button" wire:click="openFullscreen({{ $key }})"
                                        class="btn btn-primary btn-sm position-absolute"
                                        style="bottom: 5px; right: 5px;">
                                    <i class="la la-expand"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Fullscreen Modal (Optional) -->
            <div wire:ignore.self class="modal fade" id="fullscreenModal" tabindex="-1"
                 aria-labelledby="fullscreenModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ $fullscreenImage }}" class="img-fluid" id="fullscreenImage"
                                 alt="Full Screen Image">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success  pull-right  mb-3 ml-1" wire:click="thirdStep"
                    type="button">{{ __('dashboard.next') }}!
            </button>
            <button class="btn btn-danger  pull-right  mb-3" type="button"
                    wire:click="backStep">{{ __('dashboard.back') }}</button>

        </div>

        {{-- Confirm Step Display Data --}}
        <div class="setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
            <div class="row">
                <!-- Product Details -->

            </div>

            <button class="btn btn-success  pull-right  mb-3 ml-1" wire:click="submitForm"
                    type="button">{{ __('dashboard.create') }}!
            </button>
            <button class="btn btn-danger  pull-right  mb-3" type="button"
                    wire:click="backStep">{{ __('dashboard.back') }}</button>

        </div>
    </form>
</section>


@push('js')
    <script>
        $('#desc_ar').summernote({
            placeholder: 'اكتب هنا',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script>
        $('#desc_en').summernote({
            placeholder: 'write here',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush
