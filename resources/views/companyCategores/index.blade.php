@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.categories mangement'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.categories') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.categories mangement') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('site.table categories') }}</h4>
                        <div>
                            <a href="{{ route('categories.create') }}" class="btn btn-outline-info">
                                {{ __('site.new category') }}
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
                                    <th class="border-bottom-0">{{ __('site.descriptions') }}</th>
                                    <th class="border-bottom-0">{{ __('site.const_salary') }}</th>
                                    <th class="border-bottom-0">{{ __('site.status') }}</th>
                                    <th class="border-bottom-0">{{ __('site.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($companyCategories)
                                    @foreach ($companyCategories as $categories)
                                        <tr>
                                            <td>{{ $categories->name }}</td>
                                            <td>{{ $categories->note }}</td>
                                            <td>{{ number_format($categories->const_salary) }}</td>
                                            <td>{{ $categories->status() }}</td>
                                            <td>
                                                <form action="{{ route('categories.destroy', $categories->id) }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-outline-danger p-0 px-1">
                                                        <i class="mdi mdi-delete " style="font-size: 20px"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('categories.edit', $categories->id) }}"
                                                    class="btn btn-sm btn-outline-info p-0 px-1">
                                                    <i class="mdi mdi-pen " style="font-size: 20px"></i>
                                                </a>
                                                <a href="{{ route('categories.status', $categories->id) }}"
                                                    class="btn btn-sm btn-outline-secondary p-0 px-1">
                                                    @if ($categories->status == 1)
                                                        <i class="mdi mdi-download " style="font-size: 20px"></i>
                                                    @elseif ($categories->status == 0)
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
