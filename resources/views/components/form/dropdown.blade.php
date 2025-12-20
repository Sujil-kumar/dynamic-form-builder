@props(['field'])
<div class="col-6">
    <label for="" class="form-label fw-semibold">
        {{$field->label}} @if ($field->required) <span class="text-danger">*</span> @endif
    </label>
    
    <select name="responses[{{$field->id}}]" class="form-select" {{$field->required ?"required":" "}}>
        <option value="">--Select--</option>
        @foreach ($field->options as $option)
            <option value="{{$option->option_text}}">{{$option->option_text}}</option>
        @endforeach
    </select>
</div>