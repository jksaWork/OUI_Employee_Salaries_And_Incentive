@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.mange jobs'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.jobs') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.add jobs') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-12 m-3">
            <div class="card">
                <form action="{{ route('Jobs.store') }}" method="post">
                    @csrf
                    <div class="row p-3">
                        <div class="form-group col-md-6">
                            <label>{{ __('site.name') }}</label> <input class="form-control"
                                placeholder="Enter your email" type="text" name='name'>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('site.salary') }}</label> <input class="form-control"
                                placeholder="Enter your email" type="number" name='salary'>
                        </div>



                        <div class="form-group col-md-6">
                            <label>{{ __('site.descriptions') }}</label><br>
                            <textarea name="note" id="" cols="30" rows="10" class='form-control'></textarea>
                        </div>
                    </div>

                    <div class="m-3">
                        <button class="btn-outline-primary btn ">{{ __('site.save') }}</button>
                    </div>
            </div>
            </form>
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
