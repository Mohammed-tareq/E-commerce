@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.product') }} | {{ __('dashboard.show_product') }}
@endsection

@include('dashboard.product.product-css')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.show_product') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.products.index') }}">{{ __('dashboard.product') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.show_product') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('dashboard.product') }}</h4>

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
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-bookmark text-primary"></i>{{ __('dashboard.name') }}
                                                        :
                                                    </h5>
                                                    <span
                                                            class="text-primary ml-1">{{ $product->getTranslation('name', app()->getLocale()) }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-book text-primary"></i>{{ __('dashboard.small_desc') }}
                                                        :
                                                    </h5>
                                                    <span
                                                            class="text-primary ml-1">{{ $product->getTranslation('small_desc', app()->getLocale()) }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i class="ft-book text-primary"></i>
                                                        {{ __('dashboard.desc') }}:
                                                    </h5>
                                                    <span
                                                            class="text-primary ml-1">{{ $product->getTranslation('desc', app()->getLocale()) }}</span>
                                                </div>

                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-bookmark text-primary"></i>
                                                        {{ __('dashboard.brand') }} :
                                                    </h5>
                                                    <span
                                                            class="text-primary ml-1">{{ $product->brand->getTranslation('name', app()->getLocale()) }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-bookmark  text-primary"></i>
                                                        {{ __('dashboard.category') }} :
                                                    </h5>
                                                    <span
                                                            class="text-primary ml-1">{{ $product->category->getTranslation('name', app()->getLocale()) }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-skip-back  text-primary"></i>
                                                        {{ __('dashboard.sku') }} :
                                                    </h5>
                                                    <span class="text-primary ml-1">{{ $product->sku }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i class="ft-eye  text-primary"></i>
                                                        {{ __('dashboard.views') }} :
                                                    </h5>
                                                    <span class="text-primary ml-1">{{ $product->views }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-toggle-right  text-primary"></i>
                                                        {{ __('dashboard.status') }} :
                                                    </h5>
                                                    <span class="text-primary ml-1">{{ $product->status }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i
                                                                class="ft-calendar  text-primary"></i>
                                                        {{ __('dashboard.available_for') }} :
                                                    </h5>
                                                    <span class="text-primary ml-1">{{ $product->available_for }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i class="ft-clock  text-primary"></i>
                                                        {{ __('dashboard.created_at') }} :
                                                    </h5>
                                                    <span class="text-primary ml-1">{{ $product->created_at }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h5 class="font-weight-bold"><i class="ft-clock  text-primary"></i>
                                                        {{ __('dashboard.updated_at') }} :
                                                    </h5>
                                                    <span class="text-primary ml-1">{{ $product->updated_at }}</span>
                                                </div>
                                                @if ($product->manage_stock && !$product->has_variants)
                                                    <div class="d-flex align-items-center mb-1">
                                                        <h5 class="font-weight-bold"><i
                                                                    class="ft-battery-charging  text-primary"></i>
                                                            {{ __('dashboard.qty') }} :
                                                        </h5>
                                                        <span class="text-primary ml-1">{{ $product->qty }}</span>
                                                    </div>
                                                @endif
                                                @if ($product->has_variants)
                                                    <span class="badge badge-primary px-2 mt-1 "
                                                          style="font-size: 14px;">
                                                        {{ __('dashboard.has_variants') }}
                                                    </span>
                                                @else
                                                    <div class="d-flex align-items-center mb-1">

                                                        <h5 class="font-weight-bold"><i
                                                                    class="ft-cast text-primary"></i>{{ __('dashboard.price') }}
                                                            :
                                                        </h5>
                                                        <span class="text-primary ml-1">{{ $product->price }} </span>
                                                        @if ($product->has_discount)
                                                            <span class="text-danger ml-1"> <del>
                                                                    {{ $product->price + $product->discount_price }}</del></span>
                                                        @endif
                                                    </div>
                                                    @if ($product->has_discount)
                                                        <div class="d-flex align-items-center mb-1">
                                                            <h5 class="font-weight-bold"><i
                                                                        class="ft-percent text-primary"></i>{{ __('dashboard.discount') }}
                                                                :
                                                            </h5>
                                                            <span class="text-primary ml-1">{{ $product->discount }}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-1">
                                                            <h5 class="font-weight-bold"><i
                                                                        class="ft-calendar text-primary"></i>{{ __('dashboard.start_date') }}
                                                                :
                                                            </h5>
                                                            <span class="text-primary ml-1">{{ $product->discount_start }}</span>
                                                        </div>

                                                        <div class="d-flex align-items-center mb-1">
                                                            <h5 class="font-weight-bold"><i
                                                                        class="ft-calendar text-primary"></i>{{ __('dashboard.end_date') }}
                                                                :
                                                            </h5>
                                                            <span class="text-primary ml-1">{{ $product->discount_end }}</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <div id="carousel-{{ $product->id }}" class="carousel slide"
                                                     data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        @foreach ($product->images as $image)
                                                            <li data-target="#carousel-{{ $product->id }}"
                                                                data-slide-to="{{ $loop->index }}"
                                                                class="{{ $loop->first ? 'active' : '' }}"></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        @foreach ($product->images as $image)
                                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                <img src="{{ asset('uploads/products/' . $image->name) }}"
                                                                     class="d-block w-100"
                                                                     style="max-height: 400px; object-fit: contain;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carousel-{{ $product->id }}"
                                                       role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carousel-{{ $product->id }}"
                                                       role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($product->has_variants)
                                            {{-- variants tables   --}}
                                            <div class="table-responsive mt-3">
                                                <h3>{{ __('dashboard.variants') }}</h3>
                                                <table class="table table-hover mb-0 text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ __('dashboard.price') }}</th>
                                                        <th>{{ __('dashboard.qty') }}</th>
                                                        <th>{{ __('dashboard.attributes') }}</th>
                                                        <th>{{ __('dashboard.actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="product-variants">
                                                    @foreach ($product->variants as $variants)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $variants->price }}</td>
                                                            <td>{{ $variants->qty }}</td>
                                                            <td>
                                                                @foreach ($variants->variantAttributes as $variant)
                                                                    <span class="badge badge-primary px-2 mt-1 "
                                                                          style="font-size: 14px;">
                                                                            {{ $variant->attributeValue->attribute->getTranslation('name', app()->getLocale()) }}
                                                                            :
                                                                            {{ $variant->attributeValue->getTranslation('value', app()->getLocale()) }}
                                                                        </span>
                                                                @endforeach
                                                            </td>

                                                            <td>
                                                                <a class="btn btn-outline-info btn delete_variant"
                                                                   href="javascript:void(0)"
                                                                   data-product-id="{{ $product->id }}"
                                                                   data-variant-id="{{ $variants->id }}"><i
                                                                            class="la la-trash text-danger"></i>
                                                                    {{ __('dashboard.delete') }}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>


                                            @if ($product->variants->count() == 0)
                                                <p> {{ __('dashboard.product') }} {{ __('dashboard.no_has_variants') }}
                                                </p>
                                            @endif
                                        @endif


                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-primary btn-lg m-2"
                                           href="{{ route('dashboard.products.index') }}"><i class="la la-backward"></i>
                                            {{ __('dashboard.back') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script>
        $(document).on('click', '.delete_variant', function (e) {
            e.preventDefault();

            let productId = $(this).data('product-id');
            let variantId = $(this).data('variant-id');
            let url = "{{ route('dashboard.product.variant.delete', [':product_id', ':variant_id']) }}";
            url = url.replace(':product_id', productId);
            url = url.replace(':variant_id', variantId);

            let lang = '{{ app()->getLocale() }}';

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.status === true) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });


                        $('#product-variants').empty();

                        // Check if there are variants to display
                        if (data.product && data.product.length > 0) {
                            $.each(data.product, function (key, variant) {
                                let attributesHtml = '';

                                // Check if variant_attributes exists and is an array
                                if (variant.variant_attributes && Array.isArray(variant.variant_attributes)) {
                                    variant.variant_attributes.forEach(function (attr) {
                                        if (attr.attribute_value && attr.attribute_value.attribute) {
                                            let name = lang == 'ar'
                                                ? attr.attribute_value.attribute.name.ar
                                                : attr.attribute_value.attribute.name.en;
                                            let value = lang == 'ar'
                                                ? attr.attribute_value.value.ar
                                                : attr.attribute_value.value.en;

                                            attributesHtml += `<span class="badge badge-primary px-2 mt-1" style="font-size:14px;">
                                                ${name} : ${value}
                                            </span> `;
                                        }
                                    });
                                }

                                $('#product-variants').append(`
                                    <tr>
                                        <th scope="row">${key + 1}</th>
                                        <td>${variant.price || 0}</td>
                                        <td>${variant.qty || 0}</td>
                                        <td>
                                            ${attributesHtml}
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-info btn delete_variant"
                                                href="javascript:void(0)"
                                                data-product-id="${variant.product_id}"
                                                data-variant-id="${variant.id}"><i
                                                    class="la la-trash text-danger"></i>
                                                {{ __('dashboard.delete') }}
                                            </a>
                                        </td>
                                    </tr>
                                `);
                            });
                        }

                    } else if (data.status === false) {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }

                },
                errors: function (data) {
                    console.log(data.responseJSON.errors)
                }
            });
        });
    </script>
@endpush
