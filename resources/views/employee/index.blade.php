@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.employee mangement'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.employee') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.show employee') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('site.table employee') }}</h4>
                        <div>
                            <a href="{{ route('employee.create') }}" class="btn btn-outline-info">
                                {{ __('site.new employee') }}
                                <i class="mdi mdi-view-dashboard-outline"></i></a>
                        </div>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> {{ __('site.all data from permissions') }}</p>
                </div>
                <div class="card-body">
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
                                    <th class="border-bottom-0">{{ __('site.status') }}</th>
                                    <th class="border-bottom-0">{{ __('site.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($emps)
                                    @foreach ($emps as $emp)
                                        <tr>
                                            <td>{{ $emp->name }}</td>
                                            <td>{{ $emp->employeejob->name }}</td>
                                            <td>{{ $emp->due_date }}</td>
                                            <td>{{ $emp->salary }}</td>
                                            <td>{{ number_format($emp->const_salary) }}</td>
                                            <td>{{ number_format($emp->all_salary) }}</td>
                                            <td>{{ $emp->status() }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn"
                                                        data-toggle="dropdown" id="dropdownMenuButton"
                                                        type="button">{{ __('site.oprations') }} <i
                                                            class="mdi mdi-list"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        <a class="dropdown-item"
                                                            href="{{ route('employee.show', $emp->id) }}">
                                                            <i class="mdi mdi-eye "></i>
                                                            {{ __('site.show') }}
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('employee.show', $emp->id) }}">
                                                            <i class="mdi mdi-pen "></i>
                                                            {{ __('site.edit') }}
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('employee.destroy', $emp->id) }}">
                                                            <i class="mdi mdi-delete danger"></i>
                                                            {{ __('site.delete') }}
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('employee.status', $emp->id) }}">
                                                            @if ($emp->active == 1)
                                                                <i class="mdi mdi-download "></i>
                                                                {{ __('site.do not active') }}
                                                            @elseif ($emp->active == 2)
                                                                <i class="mdi mdi-upload"></i>
                                                                {{ __('site.do active') }}
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
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
