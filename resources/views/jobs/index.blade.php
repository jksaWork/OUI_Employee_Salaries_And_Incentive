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
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('site.table jobs') }}</h4>
                        <div>
                            <a href="{{ route('Jobs.create') }}" class="btn btn-outline-info">
                                {{ __('site.new jobs') }}
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
                                    <th class="border-bottom-0">{{ __('site.descriptions') }}</th>
                                    <th class="border-bottom-0">{{ __('site.salary') }}</th>
                                    <th class="border-bottom-0">{{ __('site.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($jobs)
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->name }}</td>
                                            <td>{{ $job->note }}</td>
                                            <td>{{ $job->salary }}</td>
                                            <td>
                                                <form action="{{ route('Roles.destroy', $job->id) }}" method='post'
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-outline-danger p-0 px-1" onclick="">
                                                        <i class="mdi mdi-delete " style="font-size: 18px"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('Jobs.edit', $job->id) }}"
                                                    class="btn btn-sm btn-outline-info p-0 px-1">
                                                    <i class="mdi mdi-pen " style="font-size: 18px"></i>
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
    <script>
        function confirm_submit(e) {
            event.perventDefualt()
            var myCallback = function(choice) {
                if (choice) {
                    notif({
                        'type': 'success',
                        'msg': 'Yeah!',
                        'position': 'center'
                    })
                } else {
                    notif({
                        'type': 'error',
                        'msg': '<i class="far fa-sad-tear"></i>',
                        'position': 'center'
                    })
                }
            }

            notif_confirm({
                'textaccept': 'Stay Here',
                'textcancel': 'Close The Window',
                'message': 'Are you Sure You Want to Close?',
                'callback': myCallback
            })
        }

    </script>
@endsection
