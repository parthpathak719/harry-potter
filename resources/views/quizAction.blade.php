<x-layout>
    <body style="background: url('https://images-cdn.ubuy.co.in/634269fb462eba2a6d01d3b6-harry-potter-movie-collage-1000-piece.jpg') no-repeat center top fixed; background-size: contain; background-attachment: fixed; margin: 0; padding: 0; box-sizing: border-box; background-color: #000; font-family: Georgia, serif;">
        
        <audio id="normal-audio" loop muted>
            <source src="{{ asset('audio/song.mp4') }}" type="audio/mp4">
        </audio>

        <div id="quiz-form">
            <h1 id="quiz-title">Your Score: {{ $score }}/{{ $total }}</h1>

            @foreach ($results as $r)
                <div class="question-block">
                    <p class="question-text">&nbsp;&nbsp;Q{{ $loop->iteration }}. {{ $r['question'] }}</p>
                    <p class="answer-text"><strong>You selected:</strong> {{ $r['selected'] }}</p>
                    <p class="answer-text"><strong>Result:</strong> {{ $r['correct'] }}</p>
                    <p class="answer-text"><strong>Correct Answer:</strong> {{ $r['correct_answer'] }}</p>
                </div>
            @endforeach
        </div>
        <script src="{{ asset('js/quizAction.js') }}"></script>
    </body>
</x-layout>
