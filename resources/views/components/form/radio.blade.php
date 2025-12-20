@props(['field'])
<div class="col-6">
    <label for="" class="form-label fw-semibold d-block">
        {{$field->label}} @if ($field->required) <span class="text-danger">*</span> @endif
    </label>
    @foreach($field->options as $option)
        <div class="form-check">
            <input class="form-check-input"
                   type="radio"
                   name="responses[{{ $field->id }}]"
                   value="{{ $option->option_text }}"
                   {{ $field->required ? 'required' : '' }}>
            <label class="form-check-label">
                {{ $option->option_text }}
            </label>
        </div>
    @endforeach
</div>