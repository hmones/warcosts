@extends('layouts.main')
@section('content')
    <div class="ui centered center aligned basic segment">
        <img class="ui centered image" src="{{asset('img/ukraine.png')}}" alt="Ukraine" width="200px"/>
    </div>
    <div class="ui three column stackable grid" id="infographic">
        <div class="centered column">
            @include('partials.statistic', ['title' => 'Killed', 'statistic' => $killed->ukraine])
        </div>

        <div class="column">
            @include('partials.statistic', ['title' => 'Injured', 'statistic' => $injured->ukraine])
        </div>

        <div class="column">
            @include('partials.statistic', ['title' => 'Migrated', 'statistic' => $migrated->ukraine])
        </div>
    </div>
    <div class="ui centered text-center basic segment">
        <img class="ui centered image" src="{{asset('img/russia.png')}}" alt="Russia" width="200px"/>
    </div>
    <div class="ui three column stackable grid" id="infographic">
        <div class="centered column">
            @include('partials.statistic', ['title' => 'Killed', 'statistic' => $killed->russia])
        </div>

        <div class="column">
            @include('partials.statistic', ['title' => 'Injured', 'statistic' => $injured->russia])
        </div>

        <div class="column">
            @include('partials.statistic', ['title' => 'Migrated', 'statistic' => $migrated->russia])
        </div>
    </div>
@endsection

