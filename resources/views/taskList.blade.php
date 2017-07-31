@extends('base')

@section('content')
    <div class="taskListWrap col-xs-12">
        <div class="content col-xs-12 col-md-10 col-lg-8">
            @if(!empty($searchTitle))
                <h1 class="searchHeader">{{ $searchTitle }}</h1>
            @endif
            <div class="search form-group">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form>
                    <input type="search" placeholder="Поиск" class="form-control" name="search" {{ !empty($searchStr) ? "value=" . trim($searchStr) : ''}}>
                    <button type="submit" value=""><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="clearTaskCacheWrap">
                <a href="#" id="clearTaskCache">Сбросить кэш</a>
            </div>
            @if(!empty($returnToMain))
                <a href="/">Вернуться на главную</a>
            @endif
            @include('taskTable', ['tasks' => $tasks])
        </div>
    </div>
    @include('parts/taskModal')
    @include('parts/taskSearchModal')
@endsection