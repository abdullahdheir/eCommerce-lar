<table class="table table-bordered table-condensed table-striped">
    @foreach ($data as $row)
        @if ($loop->first)
            <tr>
                @foreach ($row as $key => $value)
                    <th>{!! $key !!}</th>
                @endforeach
                <th>Action</th>
            </tr>
        @endif
        <tr>
            @foreach ($row as $key => $value)
                @if (is_string($value) || is_numeric($value))
                    <td>{!! $value !!}</td>
                @else
                    <td></td>
                @endif
                <td>
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
