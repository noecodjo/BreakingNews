<div class="form-group">
    {!! FORM::label('title', 'Article Title: ') !!}
    {!! FORM::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! FORM::label('body', 'Body: ') !!}
    {!! FORM::textarea('body', null, ['class'=>'form-control']) !!}
    {!! FORM::label('image', 'Article Image: ') !!}
    {!! FORM::file('image', null) !!}
</div>
<div class="form-group">
    <!--http://stackoverflow.com/questions/29508297/laravel-5-how-to-populate-select-box-from-database-with-id-value-and-name-value-->
    {!! FORM::label('tag_list', 'Tags:'); !!}
    @if(isset($article))
        {{-- {!! $article->tags->pluck('id')->toArray() !!} --}}
        {!! FORM::select('tag_list[]', $tag_list, $article->tags->pluck('id')->toArray() ,['class'=>'form-control', 'multiple']) !!}
    @else
        {!! FORM::select('tag_list[]', $tag_list, null ,['class'=>'form-control', 'multiple']) !!}
    @endif
</div>
<div class="form-group">
    {!! FORM::label('published_at', 'Publish on: ') !!}
    {!! FORM::input('date', 'published_at',
    \Carbon\Carbon::now()->format('Y-m-d'),
    ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! FORM::submit($submitButtonText,
    ['class' => 'btn btn-primary form-control']) !!}
</div>