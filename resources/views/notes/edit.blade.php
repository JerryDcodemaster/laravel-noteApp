<x-app-layout>
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="fs-2">Edit {{$note->headtext}}</h1>
        </div>

        <form method="POST" action="{{ route('note.update', $note->id) }}">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Head Text</label>
                    <input type="name" name="headtext" class="form-control" value="{{$note->headtext}}">
                
                    @error('headtext')
                        <p class="fw-500 text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Subtitle Text</label>
                    <textarea class="form-control" name="description" rows="3">{{$note->description}}</textarea>
                
                    @error('description')
                        <p class="fw-500 text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Note Tag</label>
                    <input type="name" name="tag" class="form-control" value="{{$note->tag}}">
                    
                    @error('tag')
                        <p class="fw-500 text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                    
                <button type="submit" class="btn btn-primary">Update changes</button>
            </form>
    </div>
</x-app-layout>