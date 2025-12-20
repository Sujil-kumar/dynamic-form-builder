@extends('layouts.app')

@section('body')
    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">{{ $form->form_name }} – Responses</h2>
            <a href="{{ url()->previous() }}" class="btn btn-secondary rounded-pill">
                ← Back
            </a>
        </div>

        @if ($responses->count() === 0)
            <div class="alert alert-info text-center">
                No responses submitted yet.
            </div>
        @endif

        @foreach ($responses as $index => $response)
            <div class="mb-4">

                <h6 class="fw-bold mb-2 text-primary">
                    Response {{ $index + 1 }}
                    <small class="text-muted ms-2">
                        ({{ $response->created_at->format('d M Y, h:i A') }})
                    </small>
                </h6>

                <div class="row g-3">
                    @foreach ($response->values as $value)
                        <div class="col-12 col-md-6">
                            <div class="simple-field">
                                <div class="simple-label">
                                    {{ $value->field->label ?? 'Deleted Field' }}
                                </div>
                                <div class="simple-value">
                                    {{ $value->value ?: '-' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr class="mt-4">
            </div>
        @endforeach

    </div>

@endsection
