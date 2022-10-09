@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.add company'))
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
                    <div class="col-md-3"></div>
                    <div class="col-6 m-3 ">
                        <form action="{{ route('company.update', $company->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row p-3">
                                <div class="form-group col-md-12">
                                    <label>{{ __('site.name') }}</label> <input class="form-control"
                                        placeholder="name of comapany" type="text" name='name'
                                        value='{{ $company->name }}'>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>{{ __('site.descriptions') }}</label> <textarea class="form-control"
                                        placeholder="Enter your email" name=' descrptions'
                                        value='{{ $company->descrptions }}'></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>{{ __('site.permissions') }}</label>
                                    <div>
                                        <select name="sttatus" class="form-control select-2">
                                            <option value="0" {{ $company->status == 0 ? 'selected' : '' }}>
                                                {{ __('site.not active') }}</option>
                                            <option value="1" {{ $company->status == 1 ? 'selected' : '' }}>
                                                {{ __('site.active') }}</option>
                                        </select>
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
