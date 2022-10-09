@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.users mangement'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.users') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.users mangement') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('site.table users') }}</h4>
                        <div>
                            <a href="{{ route('user.create') }}" class="btn btn-outline-info">
                                {{ __('site.new user') }}
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
                                    <th class="border-bottom-0">{{ __('site.email') }}</th>
                                    <th class="border-bottom-0">{{ __('site.permissions') }}</th>
                                    <th class="border-bottom-0">{{ __('site.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($users)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles->name }}</td>
                                            <td>
                                                <form action="{{ route('user.destroy', $user->id) }}" method='post'
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-outline-danger p-0 px-1"
                                                        onclick="confirm_submit()">
                                                        <i class="mdi mdi-delete " style="font-size: 20px"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-outline-info p-0 px-1">
                                                    <i class="mdi mdi-pen " style="font-size: 20px"></i>
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
