@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.salaries'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.salaries') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.add salaries') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('site.table employee not had a salary') }}</h4>
                        <div>
                            <a href="{{ route('employee.create') }}" class="btn btn-outline-info">
                                {{ __('site.new employee') }}
                                <i class="mdi mdi-view-dashboard-outline"></i></a>
                        </div>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> {{ __('site.all data from permissions') }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('search_salary') }}" method="POST">
                        @csrf

                        <div class="row m-2">
                            <div class="form-group col-md-6 ">
                                <label for="">{{ __('site.name') }}</label>
                                <input class="form-control " name='search' type="search"
                                    value='{{ isset($search) ? $search : ' ' }}' />
                            </div>
                        </div>
                    </form>


                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('site.name') }}</th>
                                    <th class="border-bottom-0">{{ __('site.job') }}</th>
                                    <th class="border-bottom-0">{{ __('site.due date') }}</th>
                                    <th class="border-bottom-0">{{ __('site.main salary') }}</th>
                                    <th class="border-bottom-0">{{ __('site.const_salary') }}</th>
                                    <th class="border-bottom-0">{{ __('site.all salary') }}</th>
                                    <th class="border-bottom-0">{{ __('site.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($employee)
                                    @foreach ($employee as $emp)
                                        <tr>
                                            <td>{{ $emp->name }}</td>
                                            <td>{{ $emp->employeejob->name }}</td>
                                            <td>{{ $emp->due_date }}</td>
                                            <td>{{ $emp->salary }}</td>
                                            <td>{{ number_format($emp->const_salary) }}</td>
                                            <td>{{ number_format($emp->all_salary) }}</td>
                                            <td>
                                                @if(request()->routeIs('add_salary'))
                                                <a href="{{ route('print_salary', $emp->id) }}"
                                                    class="btn btn-outline-primary btn-sm   ">
                                                    {{ __('site.pay salary') }}
                                                </a>
                                                @else
                                                <span class="badge badge-info">
                                                    مدفوعه
                                                </span>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
