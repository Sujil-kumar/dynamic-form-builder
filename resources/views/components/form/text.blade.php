@props(['field'])
<div class="col-6">
    <label for="" class="form-label fw-semibold">
        {{$field->label}} @if ($field->required) <span class="text-danger">*</span> @endif
    </label>
    <input type="text" name="responses[{{$field->id}}]" class="form-control" placeholder="{{$field->placeholder}}" {{$field->required ? "required":" "}}>
</div>