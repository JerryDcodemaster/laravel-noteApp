<x-app-layout>
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="fs-2">Add a New Note Here</h1>
        </div>

        <form method="POST" action="/dashboard">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Head Text</label>
                <input type="name" name="headtext" class="form-control" placeholder="eg - Attend Lectures Tomorrow" value="{{old('headtext')}}">
            
                @error('headtext')
                    <p class="fw-500 text-danger text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Subtitle Text</label>
                <textarea class="form-control" name="description" placeholder="eg - lectures begin by 10am....Mr Kunle" rows="3">{{old('description')}}</textarea>
            
                @error('description')
                    <p class="fw-500 text-danger text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Note Tag</label>
                <input type="name" name="tag" class="form-control" placeholder="Tag must be Personal, Business or Home" value="{{old('tag')}}">
                
                @error('tag')
                    <p class="fw-500 text-danger text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
                
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</x-app-layout>