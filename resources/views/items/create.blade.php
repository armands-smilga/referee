@extends('layout')
@section('content')

<div class="centered-form-container">
    <div class="centered-form"> <!-- centers the form -->
        <form method="POST" action="{{ route('items.store' )}}" enctype="multipart/form-data"> <!-- encoding type allows form data w/ file data
    to be sent as multiple parts rather than as one string, necessary to properly handle file uploads -->
            @csrf
            <div class="form-group">
                <label for="item-name"> Item Name: </label> <!-- item label -->
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="item-name" name="name" value="{{ old('name') }}" required>
                @if($errors -> has('name'))
                    <div class="invalid-feedback">
                        {{ $errors -> first('name')  }}
                    </div>
                @endif
            </div>

            <div class="form-check mb-4">
            <input type="hidden" name="is_required" value="0"> <!-- default value 0=optional 1=required -->
            <input type="checkbox" class="form-check-input" id="is_required" name="is_required" value="1" {{old('is_required') ? 'checked' : '' }}>
                <label class="form-check-label" for="is-required"> Is it Required? </label>
                @if ($errors -> has('is_required'))
                    <div class="invalid-feedback">
                        {{ errors -> first('is_required') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="item-image"> Items Image: </label>
                <input type="file" class="form-control-file {{ $errors -> has('image') ? 'is-invalid' : ''}}" id="item-image" name="image">
                @if ($errors -> has('image'))
                    <div class="invalid-feedback">
                        {{ $errors -> first('image') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success"> Add an Item </button> <!-- submit button -->
        </form>
    </div>
</div>
@endsection