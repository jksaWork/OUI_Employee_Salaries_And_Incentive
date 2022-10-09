@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.add users'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.users') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.add users') }}</span>
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
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="row p-3">
                        <div class="form-group col-md-6">
                            <label>{{ __('site.name') }}</label> <input class="form-control"
                                placeholder="Enter your email" type="text" name='name'>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('site.email') }}</label> <input class="form-control"
                                placeholder="Enter your email" type="text" name='email'>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('site.password') }}</label> <input class="form-control"
                                placeholder="Enter your email" type="text" name='password'>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('site.permissions') }}</label>
                            <div>
                                <select name="role_id" class="form-control select-2">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
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
    </div> <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
