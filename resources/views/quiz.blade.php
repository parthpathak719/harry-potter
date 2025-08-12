<x-layout>
    <x-slot name="head">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon7.ico') }}">
    </x-slot>
    <body style="background: url('https://images-cdn.ubuy.co.in/634269fb462eba2a6d01d3b6-harry-potter-movie-collage-1000-piece.jpg') no-repeat center top fixed; background-size: contain; background-attachment: fixed; margin: 0; padding: 0; box-sizing: border-box; background-color: #000; font-family:Georgia,serif;">
        <script>
            window.onload=function() {
                document.getElementById('id04').style.display='block';
            }
        </script>
        <div class="modal4" id="id04">
            <div id="modal-content4">
                <span id="close4" onclick="document.getElementById('id04').style.display='none';">&times;</span>
                <h1>Welcome To Quiz!!</h1>
                <p>Still Feel You Remember Everything?? Go Ahead!!</p>
            </div>
        </div>
        
        <audio id="normal-audio" loop muted>
            <source src="{{ asset('audio/song.mp4') }}" type="audio/mp4">
        </audio>

        <form id="quiz-form" name="quiz" method="post" action="{{ route('quizAction') }}" autocomplete="on">
            @csrf

            <h1 id="quiz-title">Harry Potter Quiz</h1>

            <div id="quiz-questions">
                @foreach ($questions as $question)
                    <div class="question-block">
                        <p class="question-text">&nbsp;&nbsp;Q{{ $loop->iteration }}. {{ $question->question_text }}</p>
                        @foreach ($question->option as $option)
                            <label class="option-label">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                                {{ $option->option_text }}
                            </label><br>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div id="quiz-buttons">
                <input id="submit" type="submit" value="Submit">
                <input id="reset" type="reset" value="Reset">
            </div>
        </form>
        <script src={{ asset('js/quiz.js') }}></script>
    </body>
</x-layout>
