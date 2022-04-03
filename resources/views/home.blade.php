@extends('layouts.main')
@section('content')
    <div class="ui three column stackable grid" id="infographic">
        <div class="centered column">
            @include('partials.statistic', ['title' => 'Killed', 'statistic' => $killed])
        </div>

        <div class="column">
            @include('partials.statistic', ['title' => 'Injured', 'statistic' => $injured])
        </div>

        <div class="column">
            @include('partials.statistic', ['title' => 'Migrated', 'statistic' => $migrated])
        </div>
    </div>
@endsection

