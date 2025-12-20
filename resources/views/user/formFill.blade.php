@extends('layouts.app')

@section('body')
    <div class="container mt-5">
        <h3 class="text-center fw-bold">{{$form->form_name}}</h3>

        <form action="{{route('user.formSubmit')}}" method="POST" class="row p-2 g-4 mt-4 rounded-3 bg-light">
            @csrf
            <input type="hidden" name="form_id" value="{{$form->id}}">
            @foreach ($form->fields as $field)
                @switch($field->type)
                    @case('text')
                        <x-form.text :field="$field"/>
                    @break

                    @case('textarea')
                        <x-form.textarea :field="$field"/>
                    @break

                    @case('number')
                        <x-form.number :field="$field"/>
                    @break

                    @case('dropdown')
                        <x-form.dropdown :field="$field"/>
                    @break

                    @case('radio')
                        <x-form.radio :field="$field"/>
                    @break

                    @case('checkbox')
                        <x-form.checkbox :field="$field"/>
                    @break
                @endswitch
            @endforeach

            <div class="col-12 text-center mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-5 rounded-pill me-2">
                    Back
                </a>

                <button type="submit" class="btn btnBlue px-5 rounded-pill">
                    Submit
                </button>
            </div>

        </form>
    </div>
@endsection