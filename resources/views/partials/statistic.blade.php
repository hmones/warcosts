<div class="ui basic center aligned centered segment">
    <img class="ui centered medium image" style="width: 200px;" src="{{asset('img/' . str($title)->lower() . '.png')}}" alt="{{$title}}">
    <h1 class="ui horizontal divider header">{{$title}}</h1>
    <div class="ui centered basic segment">
        <table class="ui fluid centered inverted red collapsing celled table">
            <tr class="total">
                <th colspan="2" style="padding:10px;text-align: center;font-family: 'Offside', cursive;letter-spacing: 5px;font-size: 3.5em;line-height: 1em;">
                    {{$statistic->total}}
                </th>
            </tr>
            <tr>
                <td class="today title" style="text-align: center;font-size: 29px">Today</td>
                <td class="ui inverted black table count" id="migratedToday" style="text-align: center;font-size: 29px;font-family: 'Offside', cursive;letter-spacing: 5px;">
                    {{$statistic->today}}
                </td>
            </tr>
        </table>
    </div>
</div>
