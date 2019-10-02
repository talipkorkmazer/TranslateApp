@extends('layouts.app')

@section('content')
    @if($status == false)
        <h2 class="is-size-3">{{$message}}</h2>
    @else
        <form action="{{action('TranslateLogsController@translate')}}" method="POST">
            @method('POST')
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="control">
                <div class="select">
                    <select name="source_lang">
                        <option value="">Detect Language</option>
                        @foreach ($languages as $code => $language)
                            <option value="{{$code}}">{{$language}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <textarea id="translate_text" name="translate_text" class="textarea" placeholder="Translate"></textarea>

            <div class="control">
                <div class="select">
                    <select name="target_lang">
                        @foreach ($languages as $code => $language)
                            <option value="{{$code}}">{{$language}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <textarea id="search_text" name="search_text" class="textarea" placeholder="Search Text"></textarea>
            <div class="control">
                <button type="submit" class="button is-link">Submit</button>
            </div>
        </form>
    @endif

@endsection
