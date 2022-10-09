@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.add employee'))
@section('css')
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.employee') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.add employee') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{ __('site.insert employee data') }}
                    </div>
                    <form action="{{ route('employee.store') }}" method="post">
                        @csrf
                        <div id="wizard3">
                            <h3>{{ __('site.Personal Information') }}</h3>
                            <section>
                                <div class="row">
                                    <div class="control-group form-group col-md-3">
                                        <label class="form-label">{{ __('name') }}</label>
                                        <input type="text" class="form-control required" placeholder="Name" name="name">
                                    </div>
                                    <div class="control-group form-group col-md-3">
                                        <label class="form-label">{{ __('site.email') }}</label>
                                        <input type="email" name='email' class="form-control required"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="control-group form-group col-md-3">
                                        <label class="form-label">{{ __('site.phone') }}</label>
                                        <input type="number" class="form-control required" name='phone'
                                            placeholder="Number">
                                    </div>
                                    <div class="control-group form-group mb-0 col-md-3">
                                        <label class="form-label">{{ __('site.age') }}</label>
                                        <input type="text" class="form-control required" name='age' placeholder="Address">
                                    </div>

                            </section>
                            <hr>
                            <h3>{{ __('site.Billing Information') }}</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>{{ __('site.job') }}
                                        </label>
                                        <select class="form-control select2-no-search" name='job_id' id="job">
                                            @isset($jobs)
                                                @foreach ($jobs as $job)
                                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('site.company') }}
                                        </label>
                                        <select class="form-control select2-no-search" name='company_id' id='section_list'>
                                            @isset($companies)
                                                @foreach ($companies as $job)
                                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('site.category') }}
                                        </label>
                                        <select class="form-control select2-no-search" name='category_id' id="product_id">
                                            <option value="1">default</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('site.status') }}
                                        </label>
                                        <select class="form-control select2-no-search" name='active' id="status">
                                            <option value="1">{{ __('site.active') }}</option>
                                            <option value="2">{{ __('site.not active') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-3">
                                        <input type="number" name="const_salary" id="const_salary" readonly
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="categories_salary" id="cat_salary" readonly
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="all_salary" id="all_salary" readonly
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn" id="clac_salary">
                                            claculator salary
                                        </a>
                                    </div>
                                </div>
                            </section>
                            <hr>
                            <h3>{{ __('site.attachmet') }}</h3>
                            <section>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">{{ __('site.descriptions') }}</label>
                                        <textarea class="form-control" placeholder="Enter your email" rows="10"
                                            name='note'></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">{{ __('site.attachmet') }}</label>
                                        <input type="file" class="dropify"
                                            data-default-file="{{ URL::asset('assets/img/photos/1.jpg') }}"
                                            data-height="200" name='pic' />
                                    </div>

                                </div>
                            </section>

                            <button class="btn btn-primary">
                                {{ __('save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script>
        $('#section_list').on('change', function() {
            var section_id = $(this).val();
            var product_list = $('#product_id');
            product_list.empty();
            $.ajax({
                method: 'get',
                url: 'http://localhost:8000/company/get_categories/' + section_id,
                success: function(data) {
                    var option = '';
                    data.forEach(singel_data => {
                        option += '<option value=' + singel_data['id'] + '>' + singel_data[
                            'name'] + '</option>';
                    });
                    product_list.append(option);
                    console.log(option)
                    console.log(product_list);
                },
                error: function(err) {
                    console.log(err);
                }
            });


            $('#clac_salary').on('click', function(e) {
                job_id = document.getElementById('job').value;
                category_id = document.getElementById('product_id').value;

                $.ajax({
                    method: 'get',
                    url: 'http://localhost:8000/jobs/get_salary/' + job_id,
                    success: function(data) {
                        $('#const_salary').val(data.salary);
                        console.log(data);
                    },
                    error: function(params) {
                        console.log(params)
                    }
                })
                $.ajax({
                    method: 'get',
                    url: 'http://localhost:8000/companyCategories/get_salary/' + category_id,
                    success: function(data) {
                        console.log(data)
                        $('#cat_salary').val(data.const_salary);
                        all_salary = parseInt($('#const_salary').val()) + parseInt($(
                            '#cat_salary').val());
                        $('#all_salary').val(all_salary);
                    },
                    error: function(params) {
                        console.log(params)
                    }
                })

            });
            $('#discount_list').on('change', function() {
                amount = parseFloat($('input[name="amount_comission"]').val());
                discount = parseFloat($('#discount').val());
                if (amount == 'undefined' || !amount) {
                    alert('that is not good');
                }
                new_maount = amount - discount;
                new_sub = new_maount * $(this).val() / 100;
                all = new_maount + new_sub;
                $('#rat_value').val(new_sub);
                $('#all_count').val(all);
            });
        });

    </script>

@endsection
