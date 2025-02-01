<label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assunto</label>
<input type="text" name="subject" value="{{ old('subject') ?? ( $question->subject ?? '' ) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>

<label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pergunta</label>
<textarea name="text" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('text') ?? ($question->text ?? '')}}</textarea>
<br>

<label for="category_ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
<select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    @foreach($categories as $category)
    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @elseif(isset($question->category->id) && $question->category->id == $category->id) selected @endif>{{ $category->name }}</option>
    @endforeach
</select>

<x-primary-button class="float-right mt-6">Salvar</x-primary-button>