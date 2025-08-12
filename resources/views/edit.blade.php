<x-layout>
    <x-slot name="head">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon4.ico') }}">
    </x-slot>
    <br><br>
    <style>
        body{
            background:url({{ $wizard->background_image }}) no-repeat center top fixed; 
            background-size: contain; 
            margin: 0; 
            padding: 0; 
            background-color: #000;
            color: #ffffff;
        }
    </style>
    @if (empty($wizard->theme_song))
        <audio id="normal-audio" loop muted>
            <source src="{{ asset('audio/song.mp4') }}" type="audio/mp4">
        </audio>
    @else
        @if($wizard->name == "Albus Percival Wulfric Brian Dumbledore")
            <audio id="normal-audio" loop muted>
                <source src="{{ asset('audio/dumbledore.mp4') }}" type="audio/mp4">
            </audio>
        @elseif($wizard->name == "Harry James Potter")
            <audio id="normal-audio" loop muted>
                <source src="{{ asset('audio/harry.mp4') }}" type="audio/mp4">
            </audio>
        @else
            <audio id="normal-audio" loop muted>
                <source src="{{ asset('audio/villain.mp4') }}" type="audio/mp4">
            </audio>
        @endif
    @endif
    
    <form id="create" name="create" autocomplete="on" method="post" action="{{ route('editAction',$wizard->id) }}">
        @csrf
        @method('PUT')
        <h1>Modify Sorcerer</h1>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $wizard->name }}" required autofocus placeholder="Enter name">
        <span class="error" id="name-error"></span>
        <br><br>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" value="{{ $wizard->type }}" required placeholder="Enter type">
        <span class="error" id="type-error"></span>
        <br><br>

        <label for="house">House:</label>
        <select name="house" id="house" required>
            <option value="">Select</option>
            @foreach ($houses as $house)
                <option value="{{ $house->id }}" {{ $wizard->house_id==$house->id ? 'selected' : '' }}>{{ $house->name }}</option>
            @endforeach
        </select>
        <span class="error" id="house-error"></span>
        <br><br>

        <label for="wand">Wand Core:</label>
        <input type="text" name="wand" id="wand" value="{{ $wizard->wand }}" required placeholder="Enter wand core">
        <span class="error" id="wand-error"></span>
        <br><br>

        <label for="specialisation">Specialties:</label>
        <textarea name="specialisation" id="specialisation" required placeholder="Enter specialties">{{ $wizard->specialisation }}</textarea>
        <span class="error" id="specialties-error"></span>
        <br><br>
        
        <label for="patronus">Patronus:</label>
        <input type="text" name="patronus" id="patronus" value="{{ $wizard->patronus }}" required placeholder="Enter patronus">
        <span class="error" id="patronus-error"></span>
        <br><br>

        <label for="title">Titles:</label>
        <textarea name="title" id="title" required placeholder="Enter titles">{{ $wizard->title }}</textarea>
        <span class="error" id="title-error"></span>
        <br><br>

        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio" required placeholder="Enter bio">{{ $wizard->bio }}</textarea>
        <span class="error" id="bio-error"></span>
        <br><br>

        <label for="quote">Famous Quotes(Optional):</label>
        <textarea name="quote" id="quote" placeholder="Enter quotes">{{ $wizard->quote }}</textarea>
        <span class="error" id="quote-error"></span>
        <br><br>

        <label for="image">Image Link:</label>
        <input type="url" name="image" id="image" value="{{ $wizard->image }}" required placeholder="Enter image link">
        <span class="error" id="image-error"></span>
        <br><br>

        <label for="background_image">Background-Image Link:</label>
        <input type="url" name="background_image" id="background_image" value="{{ $wizard->background_image }}" required placeholder="Enter background-image link">
        <span class="error" id="background-error"></span>
        <br><br>

        <input id="recruit"type="submit" value="Modify">&nbsp;
        <input id="clear" type="reset" value="Reset">

        @if ($errors->any())
            <ul type="none">
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{$error}}</li>                    
                @endforeach
            </ul>
        @endif
    </form>
    <script src="{{ asset('js/edit.js') }}"></script>
</x-layout>