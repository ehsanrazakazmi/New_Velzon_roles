@extends('layouts.master')
@section('title')
    @lang('translation.role')
@endsection
@section('css')
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Tables
        @endslot
        @slot('title')
            Roles
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"><strong>Roles</strong>:&nbsp;&nbsp;&nbsp; Add, Edit & Remove</h4>
                </div><!-- end card header -->

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                {{-- ye data table uthao --}}
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            {{-- {!! Form::model($role, ['method' => 'POST','route' => ['role.edit', $role->id]]) !!} --}}
                           
                            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['role.update', $role->id]]) !!}
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Name: </label>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    {!! Form::textarea('description', $role->description ?? null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
                                </div>

                                <div class="mb-3">
                                    <label for="choices-multiple-default" class="form-label text-muted">Permissions</label>
                                    
                                    <br>
                                    {!! Form::select('permission[]', $permission->pluck('name', 'name'), $role->permissions->pluck('name'), ['class' => 'js-example-basic-multiple', 'multiple' => 'multiple']) !!}
                                </div>

                                <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light mt-3">Update</button>
                            {!! Form::close() !!}

                        </div>

                        
                    </div>
                </div><!-- end card -->
                {{-- yaha tak --}}



            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->




@endsection
@section('script')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <!-- Choices.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>


    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

 
@endsection
