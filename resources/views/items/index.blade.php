@extends('layout')
@section('content')

<link href="{{ asset('itemss.css') }}" rel="stylesheet"> <!-- css -->

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Referee Checklist</h1>
            <a href="{{ route('items.create') }}" class="btn btn-success"> Add a New Item </a> <!-- button that takes to items.create.blade.php -->
        </div>
        
        <div class="mt-4">
            @foreach($items as $item)
                <div class="card mt-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <!-- display item image IF it exists -->
                            @if($item -> image)
                            <img src="{{Storage::url('item_images/' . $item -> image)}}" alt="{{ $item -> name }}"> <!-- storage src link -->
                            @endif
                            <label class="form-check-label" for="item-{{ $item -> id }}">{{ $item -> name }}</label>
                            <!-- display if item is required or optional -->
                            @if($item -> is_required)
                            <span class="text-danger">‎ ‎ ‎ ‎ Required</span>
                            @else
                            <span class="text-success">‎ ‎ ‎‎ Optional</span> <!-- invisible  char to add space between img and display boolean -->
                            @endif
                        </div>
                        <div>
                            <!-- update form -->
                            <form method="POST" action="{{ route('items.update', $item -> id) }}" class="d-inline"> <!-- inline block in class to display elments in it w/h/p/m -->
                                @csrf
                                @method('PATCH')
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="item-{{ $item->id }}" name="is_available" value="1" {{$item->is_available ? 'checked' : '' }}>
                                </div>
                                <button type="submit" class="btn btn-primary"> Update </button>
                            </form>
                            <!-- delete form -->
                            <form method="POST" action="{{ route('items.destroy',$item -> id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection
