<x-layout>

    @if($records)
        <div class="recordContent">
            <table class="table-fixed">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Location</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td>{{$loop -> index + 1}}</td>
                        <td>{{ $record -> name }}</td>
                        <td>{{ $record -> email }}</td>
                        <td>{{ $record -> location }}</td>
                        <td>{{ $record -> phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

</x-layout>