<x-layout>
    <x-slot name="head">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon5.ico') }}">
    </x-slot>
    <style>
        body{
            background:url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/6703aada-2649-4453-b1cb-c1dade721c88/dg29l08-f4990e62-db64-48bc-8f95-c04904809ce0.png/v1/fill/w_1192,h_670,q_70,strp/hogwarts_legacy___ever_edition_4k_wallpaper_by_aksensei_dg29l08-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9OTAwIiwicGF0aCI6IlwvZlwvNjcwM2FhZGEtMjY0OS00NDUzLWIxY2ItYzFkYWRlNzIxYzg4XC9kZzI5bDA4LWY0OTkwZTYyLWRiNjQtNDhiYy04Zjk1LWMwNDkwNDgwOWNlMC5wbmciLCJ3aWR0aCI6Ijw9MTYwMCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.6LjlLEOD-PgfJ1OsnOrEr-fayntSnFhEcHj8-OIQDns') no-repeat center fixed;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #ffffff;
            box-sizing: border-box;
        }
    </style>
    <br><br>
    @if (!$errors->any())
        <script>
            window.onload=function(){
                document.getElementById('id03').style.display='block';
            }
        </script>
        <div class="modal3" id="id03">
            <div id="modal-content3">
                <span id="close3" onclick="document.getElementById('id03').style.display='none';">&times;</span>
                <h1>Welcome To Recruit!!</h1>
                <p>Fill Out The Form To Recruit A "Sorcerer"</p>
            </div>
        </div>
    @endif
    <audio id="normal-audio" loop muted>
        <source src="{{ asset('audio/song.mp4') }}" type="audio/mp4">
    </audio>
    

    <form id="create" name="create" autocomplete="on" method="post" action="{{ route('recruitAction') }}">
        @csrf
        <h1>Recruit Sorcerer</h1>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Enter name">
        <span class="error" id="name-error"></span>
        <br>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" value="{{ old('type') }}" required placeholder="Enter type">
        <span class="error" id="type-error"></span>
        <br>

        <label for="house">House:</label>
        <select name="house" id="house" required>
            <option value="">Select</option>
            @foreach ($houses as $house)
                <option value="{{ $house->id }}" {{ old('house')==$house->id ? 'selected' : '' }}>{{ $house->name }}</option>
            @endforeach
        </select>
        <span class="error" id="house-error"></span>
        <br>

        <label for="wand">Wand Core:</label>
        <input type="text" name="wand" id="wand" value="{{ old('wand') }}" required placeholder="Enter wand core">
        <span class="error" id="wand-error"></span>
        <br>

        <label for="specialisation">Specialties:</label>
        <textarea name="specialisation" id="specialisation" required placeholder="Enter specialties">{{ old('specialisation') }}</textarea>
        <span class="error" id="specialties-error"></span>
        <br>
        
        <label for="patronus">Patronus:</label>
        <input type="text" name="patronus" id="patronus" value="{{ old('patronus') }}" required placeholder="Enter patronus">
        <span class="error" id="patronus-error"></span>
        <br>

        <label for="title">Titles:</label>
        <textarea name="title" id="title" required placeholder="Enter titles">{{ old('title') }}</textarea>
        <span class="error" id="title-error"></span>
        <br>

        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio" required placeholder="Enter bio">{{ old('bio') }}</textarea>
        <span class="error" id="bio-error"></span>
        <br>

        <label for="quote">Famous Quotes(Optional):</label>
        <textarea name="quote" id="quote" placeholder="Enter quotes">{{ old('quote') }}</textarea>
        <span class="error" id="quote-error"></span>
        <br>

        <label for="image">Image Link:</label>
        <input type="url" name="image" id="image" value="{{ old('image') }}" required placeholder="Enter image link">
        <span class="error" id="image-error"></span>
        <br>

        <label for="background_image">Background-Image Link:</label>
        <input type="url" name="background_image" id="background_image" value="{{ old('background_image') }}" required placeholder="Enter background-image link">
        <span class="error" id="background-error"></span>
        <br>

        <input id="recruit" type="submit" value="Recruit">&nbsp;
        <input id="clear" type="reset" value="Clear">

        @if ($errors->any())
            <ul type="none">
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{$error}}</li>                    
                @endforeach
            </ul>
        @endif
    </form>
    <script src="{{ asset('js/recruit.js') }}"></script>
</x-layout>