<div class="ui basic center aligned centered segment">
    <i class="ui {{$title === "Injured" ? "band aid" : ($title === "Migrated" ? "suitcase" : "ambulance")}} huge red icon"></i>
    <h1 class="ui horizontal divider header">{{$title}}</h1>
    <div class="ui centered basic segment">
        <table class="ui fluid centered inverted red collapsing celled table">
            <tr class="total">
                <th colspan="2" style="padding:10px;text-align: center;font-family: 'Offside', cursive;letter-spacing: 5px;font-size: 3em;line-height: 1em;">
                    {{$statistic->total}}
                </th>
            </tr>
            <tr>
                <td class="today title" style="text-align: center;font-size: 1em;font-family: 'Offside', cursive;letter-spacing: 5px;">Updated</td>
                <td class="ui inverted black table count" id="migratedToday" style="text-align: center;font-size: 1em;font-family: 'Offside', cursive;letter-spacing: 5px;">
                    {{\Illuminate\Support\Carbon::createFromFormat('d.m.Y', $statistic->date)->diffForHumans()}}
                </td>
            </tr>
        </table>
    </div>
</div>
