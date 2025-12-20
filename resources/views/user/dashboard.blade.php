@extends('layouts.app')

@section('body')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="p-5 rounded-4 text-center">
                    <h1 class="fw-bold mb-3 blueText">Welcome to Dynamic Forms</h1>
                    <p class="lead mb-4 fw-semibold blueText">
                        Fill out and submit forms easily. Access available forms, see instructions, and submit without
                        login.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h3 class="mb-4 fw-bold text-center mx-auto" id="forms">Available Forms</h3>

                @if ($forms->count() > 0)
                    @foreach ($forms as $form)
                        <div class="py-3 row g-3 mx-auto" style="max-width: 1000px;">
                            <div class="col mx-auto">
                                <div class="cardGreen rounded-5 bg-light">
                                    <div class="card-body text-center">
                                        <div class="row align-items-center text-center">

                                            <div class="col-7 mt-3">
                                                <h3 class="card-title fw-bold mb-3">
                                                    {{ $form->form_name }}
                                                </h3>
                                            </div>

                                            <div class="d-flex justify-content-center align-items-center col-4 col-md-2 mt-2 mt-md-0">
                                                <a href="{{ route('user.formFill', $form->id) }}" 
                                                    class="btn rounded-pill w-100 fw-semibold btnGreen">Fill Form
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div class="alert alert-info">
                        No forms are available at the moment.
                    </div>
                @endif
            </div>
        </div>

    </div>


    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
@endsection
