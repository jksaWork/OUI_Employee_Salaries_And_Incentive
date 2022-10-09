@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.comapny mangement'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.company') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.comapny mangement') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('site.table company') }}</h4>
                        <div>
                            <a href="{{ route('company.create') }}" class="btn btn-outline-info">
                                {{ __('site.new comapny') }}
                                <i class="mdi mdi-view-dashboard-outline"></i> </a>
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
                                    <th class="border-bottom-0">{{ __('site.description') }}</th>
                                    <th class="border-bottom-0">{{ __('site.status') }}</th>
                                    <th class="border-bottom-0">{{ __('site.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($companies)
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->descrptions }}</td>
                                            <td>{{ $company->status() }}</td>
                                            <td>
                                                <form action="{{ route('company.destroy', $company->id) }}" method='post'
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-outline-danger p-0 px-1"
                                                        onclick="confirm_submit()">
                                                        <i class="mdi mdi-delete " style="font-size: 20px"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('company.edit', $company->id) }}"
                                                    class="btn btn-sm btn-outline-info p-0 px-1">
                                                    <i class="mdi mdi-pen " style="font-size: 20px"></i>
                                                </a>
                                                <a href="{{ route('company.status', $company->id) }}"
                                                    class="btn btn-sm btn-outline-secondary p-0 px-1">
                                                    @if ($company->status == 1)
                                                        <i class="mdi mdi-download " style="font-size: 20px"></i>
                                                    @elseif ($company->status == 0)
                                                        <i class="mdi mdi-upload " style="font-size: 20px"></i>
                                                    @endif

                                                </a>
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
