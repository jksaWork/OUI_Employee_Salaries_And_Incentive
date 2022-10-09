@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.pay salary'))
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.salaries') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.pay salary') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">{{ __('site.pay salary') }}</h1>
                            <div class="billed-from">
                                <h6>{{ __('site.app_name') }}</h6>

                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">{{ __('site.done salary') }}</label>
                                <div class="billed-to">
                                    <h6>محمد التجاني عثمان</h6>
                                    <p>jksaaltigani@gmial.com<br>
                                        123 534 2345<br>
                                        Email: youremail@companyname.com</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">Invoice Information</label>
                                <p class="invoice-info-row"><span>{{ __('site.name') }}</span>
                                    <span>{{ $employee->name }}</span>
                                </p>
                                <p class="invoice-info-row"><span>{{ __('site.id') }}</span>
                                    <span>{{ $employee->id }}</span>
                                </p>
                                <p class="invoice-info-row"><span>{{ __('site.due date') }}</span>
                                    <span>{{ $employee->due_date }}
                                    </span>
                                </p>
                                <p class="invoice-info-row"><span>{{ __('site.salary') }}:</span>
                                    <span>{{ $employee->salary }}
                                    </span>
                                </p>
                                <p class="invoice-info-row"><span>{{ __('site.const_salary') }}:</span>
                                    <span>{{ $employee->const_salary }}
                                    </span>
                                </p>
                                <p class="invoice-info-row pb-4"><span>{{ __('site.all salary') }}:</span>
                                    <span>{{ $employee->all_salary }}
                                    </span>
                                </p>
                                <form action="{{ route('salary.update', $employee->id) }}" method="post"
                                    style="display: inline-block">
                                    @method('patch')
                                    @csrf
                                    <button class="btn btn-primary">{{ __('site.pay') }}</button>
                                </form>
                                <button class="btn btn-warning">{{ __('site.print') }}</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
@endsection
