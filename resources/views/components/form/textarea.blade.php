@props(['field'])
<div class="col-12 col-md-6">
    <label for="" class="form-label fw-semibold">
        {{$field->label}} @if ($field->required) <span class="text-danger">*</span> @endif
    </label>
    <textarea 
        name="responses[{{$field->id}}]" 
        class="form-control" 
        rows="3" 
        placeholder="{{$field->placeholder}}" 
        {{$field->required ? "required":" "}}>
    </textarea>
</div>