<h1>Olá, a sua pergunta foi respondida no forum por: {{ $userRepliedQuestion->user->name }}</h1>

<a href="{{ route('forum.show', $userRepliedQuestion->question->id) }}">Verifique sua resposta!</a>