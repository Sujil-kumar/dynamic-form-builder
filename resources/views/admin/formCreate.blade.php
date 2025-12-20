@extends('layouts.app')

@section('body')
<div class="container-fluid my-4">
    <h2 class="text-center fw-bold blueText">Create Form</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.formSave')}}" method="POST">
        @csrf

        <div class="col-12 col-md-8 mx-auto pt-3 my-4">
            <div class="row align-items-center">
                <label for="form_name" class="col-4 col-form-label fs-4 fw-semibold text-end">Form Name:</label>
                <div class="col-8">
                    <input type="text" class="form-control form-control-lg" name="form_name" id="form_name" required>
                </div>
            </div>
        </div>
        
        <div class="bg-primary bg-opacity-25 rounded-4 p-2">
            <div id="fields">
                <h4 class="text-center fw-bold">Form Fields</h4>
            
                <div class="border rounded-3 p-3 m-3 bg-light row align-items-end g-3 fieldRow">
            
                    <div class="col-6 col-md">
                        <label class="form-label fw-semibold">Field Label <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fields[0][label]" required>
                    </div>
            
                    <div class="col-6 col-md">
                        <label class="form-label fw-semibold">Field Type <span class="text-danger">*</span></label>
                        <select name="fields[0][type]" class="form-select fieldType" data-index="0" required>
                            <option value="" selected disabled>--select Type--</option>
                            <option value="text">text</option>
                            <option value="textarea">textarea</option>
                            <option value="number">number</option>
                            <option value="dropdown">dropdown</option>
                            <option value="checkbox">checkbox</option>
                            <option value="radio">radio</option>
                        </select>
                    </div>
            
                    <div class="col-4 col-md">
                        <label class="form-label fw-semibold d-block">Required <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fields[0][required]" value="1">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fields[0][required]" value="0" checked>
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
            
                    <div class="col-4 col-md">
                        <label class="form-label fw-semibold">Placeholder</label>
                        <input type="text" class="form-control" name="fields[0][placeholder]">
                    </div>
            
                    <div class="col-4 col-md">
                        <label class="form-label fw-semibold">Sort Order <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="fields[0][sort_order]" required>
                    </div>
                    <div class="col-12 fieldOptions d-none mt-3">
                        <label class="fw-semibold">Options <span class="text-danger">*</span></label>
                        <div class="optionList row">

                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary addOption mt-2">
                            <i class="fa fa-plus me-1"></i> Add Option
                        </button>
                    </div>
                    <div class="col-12 col-md my-auto text-center mt-4">
                        <button type="button" class="btn btn-sm btn-outline-danger removeField">
                           <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button type="button" id="addFieldBtn" class="btn btn-primary fw-bold rounded-pill">
                    <i class="fa fa-plus me-1"></i> Add Field
                </button>
            </div>

        </div>

        <div class="d-flex justify-content-center align-items-center gap-4 my-5">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg rounded-pill px-5">← Back</a>
            <button type="submit" class="btn btnBlue btn-lg fw-bold rounded-pill px-5">
                Create
            </button>

        </div>

    </form>
</div>

<script>

$(document).ready(function(){
    let fieldIndex = 1;

    $('#addFieldBtn').on('click', function () {

        let fieldHtml = `
        <div class="border rounded-3 p-3 m-3 bg-light row align-items-end g-3 fieldRow">

            <div class="col-6 col-md">
                <label class="form-label fw-semibold">Field Label <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="fields[${fieldIndex}][label]" required>
            </div>

            <div class="col-6 col-md">
                <label class="form-label fw-semibold">Field Type <span class="text-danger">*</span></label>
                <select name="fields[${fieldIndex}][type]" data-index=${fieldIndex} class="form-select fieldType" required>
                    <option value="" disabled selected>--select Type--</option>
                    <option value="text">text</option>
                    <option value="textarea">textarea</option>
                    <option value="number">number</option>
                    <option value="dropdown">dropdown</option>
                    <option value="checkbox">checkbox</option>
                    <option value="radio">radio</option>
                </select>
            </div>

            <div class="col-4 col-md">
                <label class="form-label fw-semibold d-block">Required <span class="text-danger">*</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="fields[${fieldIndex}][required]" value="1">
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="fields[${fieldIndex}][required]" value="0" checked>
                    <label class="form-check-label">No</label>
                </div>
            </div>

            <div class="col-4 col-md">
                <label class="form-label fw-semibold">Placeholder</label>
                <input type="text" class="form-control" name="fields[${fieldIndex}][placeholder]">
            </div>

            <div class="col-4 col-md">
                <label class="form-label fw-semibold">Sort Order <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="fields[${fieldIndex}][sort_order]" required>
            </div>

            <div class="col-12 fieldOptions d-none mt-3">
                <label class="fw-semibold">Options <span class="text-danger">*</span></label>

                <div class="optionList row"></div>

                <button type="button" class="btn btn-sm btn-outline-primary addOption mt-2">
                    <i class="fa fa-plus me-1"></i> Add Option
                </button>
            </div>

            <div class="col-12 col-md my-auto text-center mt-4">
                <button type="button" class="btn btn-sm btn-outline-danger removeField">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        `;

        $('#fields').append(fieldHtml);
        fieldIndex++;
    });

    $(document).on('click', '.removeField', function () {
        
        if ($('.fieldRow').length > 1) {
        $(this).closest('.fieldRow').remove();
        } 
        else {
            alert('At least one field is required.');
        }
    });

    function getOptionHtml(index) {
        return `
            <div class="col-12 col-md-3 optionRow">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="fields[${index}][options][]" placeholder="Option value" required>
                    <button type="button" class="btn btn-outline-danger removeOption">✕</button>
                </div>
            </div>
        `;
    }


    $(document).on('change', '.fieldType', function () {

        let type = $(this).val();
        let fieldRow = $(this).closest('.fieldRow');
        let optionsDiv = fieldRow.find('.fieldOptions');
        let optionList = fieldRow.find('.optionList');
        let index = $(this).data('index');

        if (['dropdown', 'checkbox', 'radio'].includes(type)) {

            optionsDiv.removeClass('d-none');
            optionList.empty();

            for (let i = 0; i < 2; i++) {
                optionList.append(getOptionHtml(index));
            }
            optionList.find('input:first').focus();

        } else {
            optionsDiv.addClass('d-none');
            optionList.empty();
        }
    });

    $(document).on('click', '.addOption', function () {

        let fieldRow = $(this).closest('.fieldRow');
        let optionList = fieldRow.find('.optionList');
        let index = fieldRow.find('.fieldType').data('index');

        optionList.append(getOptionHtml(index));
    });

    $(document).on('click', '.removeOption', function () {
        let optionList = $(this).closest('.optionList');

        if (optionList.find('.optionRow').length > 2) {
            $(this).closest('.optionRow').remove();
        } else {
            alert('At least two options are required.');
        }
    });


})
    
</script>

@endsection
