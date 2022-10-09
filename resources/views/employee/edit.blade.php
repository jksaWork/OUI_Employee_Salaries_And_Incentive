@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.edit category'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.company') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.add company') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-12 m-3 ">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row p-3">
                                <div class="form-group col-md-6">
                                    <label>{{ __('site.name') }}</label> <input class="form-control"
                                        placeholder="Enter your email" type="text" name='name'
                                        value="{{ $category->name }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('site.descriptions') }}</label> <textarea class="form-control"
                                        placeholder="Enter your email" name='note'>{{ $category->note }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('site.const_salary') }}</label> <input class="form-control"
                                        name='const_salary' type="number" value="{{ $category->const_salary }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('site.company') }}</label>
                                    <div>
                                        <select name="company_id" class="form-control select-2">
                                            @isset($companies)
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"
                                                        {{ $company->id == $category->company_id ? 'selected' : '' }}>
                                                        {{ $company->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('site.status') }}</label>
                                    <div>
                                        <select name="status" class="form-control select-2">
                                            <option value="0">{{ __('site.not active') }}</option>
                                            <option value="1">{{ __('site.active') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="m-3">
                                <button class="btn-outline-primary btn ">{{ __('site.save') }}</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
