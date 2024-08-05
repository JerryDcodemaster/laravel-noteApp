<x-app-layout>
    <div class="bg-secondary py-2 mb-3">
        <div class="container my-3 d-flex justify-content-between">
            <input type="name" class="form-control w-75 py-2" placeholder="Search for anything...">
        
            <a type="button" href="/note/create" class="btn btn-primary text-center">
                <i class="fa-solid fa-plus"></i>
                Add Note
            </a>
        </div>
    </div>

    <main class="container pb-5">
        <div class="mb-4 d-flex justify-content-between">
            <h3 class="fw-semibold">Your tasks</h3>            
        </div>

        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ALL</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">PERSONAL</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">HOME</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business-tab-pane" type="button" role="tab" aria-controls="business-tab-pane" aria-selected="false">BUSINESS</button>
            </li>
        </ul>
          
        <div class="tab-content px-0 px-xl-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" tabindex="0">
                <div class="row gap-3">
                    @foreach ($notes as $note)
                        <div class="card bg-white col-3" style="width: 22rem;">
                            <div class="card-body">
                                <div class="mb-3 d-flex justify-content-between">
                                    @if ($note->tag == "personal" || $note->tag == "Personal")
                                        <button class="btn-tags" style="
                                        font-size: 12px;
                                        background-color: rgb(190, 90, 190);
                                        padding: 5px 12px;
                                        border: none;
                                        border-radius: 50px;
                                        color: white;">
                                        {{ $note->tag }}</button>
                                    @endif

                                    @if ($note->tag == "business" || $note->tag == "Business")
                                        <button class="btn-tags" style="
                                        font-size: 12px;
                                        background-color: rgb(92, 90, 190);
                                        padding: 5px 12px;
                                        border: none;
                                        border-radius: 50px;
                                        color: white;">
                                        {{ $note->tag }}</button>
                                    @endif

                                    @if ($note->tag == "home" || $note->tag == "Home")
                                        <button class="btn-tags" style="
                                            font-size: 12px;
                                            background-color: rgb(131, 212, 131);
                                            padding: 5px 12px;
                                            border: none;
                                            border-radius: 50px;
                                            color: black;"
                                        >
                                            {{ $note->tag }}
                                        </button>                            
                                    @endif
                                    
                                    <div style="display: flex; justify-content: center; align-items: center; cursor: pointer;">
                                        <input type="checkbox" name="" id="">
                                        <a href="{{ route('note.edit', $note->id) }}"><i class="fa-solid fa-pen px-3"></i></a>
                                        <form method="delete">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('note.destroy', $note->id) }}">

                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                                
                                <h5 class="card-title fw-semibold">{{ $note->headtext }}<h5>
                                <p class="card-text" style="font-size: 15px; height: 100px;">{{ $note->description }}</p>
                                <p style="text-align: right; color: grey; font-size: 12px;" class="mb-0">{{$note->created_at}}</p>
                            </div>
                        </div>  
                    @endforeach 
                </div>
            </div>

            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" tabindex="0">
                <div class="row gap-3">
                    @foreach ($notes as $note)
                        @if ($note->tag == "Personal" || $note->tag == "personal")

                            <div class="card bg-white col-3" style="width: 22rem;">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between">
                                        @if ($note->tag == "Personal" | $note->tag == "personal")
                                            <button class="btn-tags" style="
                                            font-size: 12px;
                                            background-color: rgb(190, 90, 190);
                                            padding: 5px 12px;
                                            border: none;
                                            border-radius: 50px;
                                            color: white;">
                                            {{ $note->tag }}</button>
                                        @endif

                                        <div style="display: flex; justify-content: center; align-items: center; cursor: pointer;">
                                            <input type="checkbox" name="" id="">
                                            <a href="{{ route('note.edit', $note->id) }}"><i class="fa-solid fa-pen px-3"></i></a>
                                            <form method="delete">
                                                @csrf
                                                @method('delete')
    
                                                <a href="{{ route('note.destroy', $note->id) }}">
    
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <h5 class="card-title fw-semibold">{{ $note->headtext }}<h5>
                                    <p class="card-text" style="font-size: 15px; height: 100px;">{{ $note->description }}</p>
                                    <p style="text-align: right; color: grey; font-size: 12px;" class="mb-0">22.01.2023</p>
                                </div>
                            </div>  
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" tabindex="0">
                <div class="row gap-3">
                    @foreach ($notes as $note)
                        @if ($note->tag == "Home" || $note->tag == "home")

                            <div class="card bg-white col-3" style="width: 22rem;">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between">
                                        @if ($note->tag == "Home" | $note->tag == "home")
                                            <button class="btn-tags" style="
                                            font-size: 12px;
                                            background-color: rgb(131, 212, 131);
                                            padding: 5px 12px;
                                            border: none;
                                            border-radius: 50px;
                                            color: black;">
                                            {{ $note->tag }}</button>
                                        @endif

                                        <div style="display: flex; justify-content: center; align-items: center; cursor: pointer;">
                                            <input type="checkbox" name="" id="">
                                            <a href="{{ route('note.edit', $note->id) }}"><i class="fa-solid fa-pen px-3"></i></a>
                                            <form method="delete">
                                                @csrf
                                                @method('delete')
    
                                                <a href="{{ route('note.destroy', $note->id) }}">
    
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <h5 class="card-title fw-semibold">{{ $note->headtext }}<h5>
                                    <p class="card-text" style="font-size: 15px; height: 100px;">{{ $note->description }}</p>
                                    <p style="text-align: right; color: grey; font-size: 12px;" class="mb-0">22.01.2023</p>
                                </div>
                            </div>  
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="business-tab-pane" role="tabpanel" tabindex="0">
                <div class="row gap-3">
                    @foreach ($notes as $note)
                        @if ($note->tag == "Business" || $note->tag == "business")

                            <div class="card bg-white col-3" style="width: 22rem;">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between">
                                        @if ($note->tag == "Business" | $note->tag == "business")
                                            <button class="btn-tags" style="
                                            font-size: 12px;
                                            background-color: rgb(92, 90, 190);
                                            padding: 5px 12px;
                                            border: none;
                                            border-radius: 50px;
                                            color: white;">
                                            {{ $note->tag }}</button>
                                        @endif

                                        <div style="display: flex; justify-content: center; align-items: center; cursor: pointer;">
                                            <input type="checkbox" name="" id="">
                                            <a href="{{ route('note.edit', $note->id) }}"><i class="fa-solid fa-pen px-3"></i></a>
                                            <form method="delete">
                                                @csrf
                                                @method('delete')
    
                                                <a href="{{ route('note.destroy', $note->id) }}">
    
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <h5 class="card-title fw-semibold">{{ $note->headtext }}<h5>
                                    <p class="card-text" style="font-size: 15px; height: 100px;">{{ $note->description }}</p>
                                    <p style="text-align: right; color: grey; font-size: 12px;" class="mb-0">22.01.2023</p>
                                </div>
                            </div> 
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
