@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 offset-md-2">

            <div class="pb-2 mt-4 mb-2 border-bottom">
                <h1>
                    {{ $profileUser->name }}
                </h1>
                <small> Since: {{ $profileUser->created_at->diffForHumans() }} </small>
            </div>
            @foreach ($threads as $thread)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="level">
                        <div class="flex">
                            <a href="{{route('profile',$thread->creator)}}">
                                {{$thread->creator->name}}
                            </a> posted:
                            <a href="{{ $thread->path() }}">
                                {{$thread->title}}
                            </a>
                        </div>
                        <span>
                            {{$thread->created_at->diffForHumans()}}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
            @endforeach
            {{ $threads->links() }}

        </div>

    </div>

</div>


@endsection