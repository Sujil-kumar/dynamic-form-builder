@extends('layouts.app')

@section('body')
    <div class="container my-5">
        <h2 class="text-center fw-bold blueText">Admin Dashboard</h2>
        <div class="row text-center mt-4">
            <div class="col-4">
                <div class="card adminCard shadow-sm">
                    <div class="card-body">
                        <h5>Total Forms</h5>
                        <h2>{{$forms->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Total Response</h5>
                        <h2>{{$responses->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Active Forms</h5>
                        <h2 id="activeCount">{{$activeForm->count()}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center text-center rounded-3 mt-5 bg-secondary bg-opacity-25 p-2">
            <div class="col-8">
                <h3 class="blnBlue">Form List</h3>
            </div>
            <div class="col-4 text-end">
                <a href="{{route('admin.formCreate')}}" class="btn btnBlue fw-semibold">
                    <i class="fa fa-plus me-1"></i> Create New Form
                </a>
            </div>
        </div>

        <div class="mt-3">
            @foreach($forms as $form)
                <div class="row align-items-center p-3 mb-3 rounded-5 text-center bg-white shadow-sm formList">
                    <div class="col-3">
                        <h4 class="blueText fw-bold">{{ $form->form_name }}</h4>
                    </div>

                    <div class="col-3 text-end">
                        <a href="{{route('admin.editForm',$form->id)}}" class="btn btn-sm btn-outline-primary fw-semibold">
                            <i class="fas fa-edit"></i>edit
                        </a>
                    </div>

                    <div class="col-3 text-end">
                        <a href="{{route('admin.formResponse',$form->id)}}" class="btn btn-sm btn-primary rounded-pill fw-semibold">
                            <i class="fas fa-eye"></i> View Responses
                        </a>
                    </div>

                    <div class="col-3 text-start">
                        <div class="form-check form-switch d-flex align-items-center justify-content-center">
                            <input
                                class="form-check-input activeChange"
                                type="checkbox"
                                role="switch"
                                data-id="{{ $form->id }}"
                                {{ $form->is_active ? 'checked' : '' }}
                            >

                            <label class="form-check-label ms-2 fw-semibold statusText">
                                {{ $form->is_active ? 'Active' : 'Inactive' }}
                            </label>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

<script>
$(document).ready(function () {

    $('.activeChange').on('change', function () {

        let checkbox = $(this);
        let formId = checkbox.data('id');
        let isActive = checkbox.is(':checked') ? 1 : 0;

        let statusLabel = checkbox.closest('.form-check').find('.statusText');
        let activeCountEl = $('#activeCount');
        let currentCount = parseInt(activeCountEl.text()) || 0;

        statusLabel.text(isActive ? 'Active' : 'Inactive');
        activeCountEl.text(isActive ? currentCount + 1 : Math.max(0, currentCount - 1));

        $.ajax({
            url: "{{ route('admin.formStatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: formId,
                is_active: isActive
            },
            error: function () {
                alert('Something went wrong');

                checkbox.prop('checked', !isActive);
                statusLabel.text(!isActive ? 'Active' : 'Inactive');
                activeCountEl.text(currentCount);
            }
        });
    });

});

</script>

@endsection





  {{-- @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif --}}