<x-layout>
    <div class="row">
        <div class="col align-self-center">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="vertical-align: middle">IP</th>
                        <th scope="col" style="vertical-align: middle">Label</th>
                        <th scope="col" style="vertical-align: middle">Comment</th>
                        <th scope="col" style="vertical-align: middle">
                            <span style="vertical-align: middle">Actions </span>
                            <a href="/ipaddress/create" class="btn btn-primary btn-sm" style="float: right">Add IP</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ips as $ip)
                        <tr>
                            <td>{{ $ip->ip }}</td>
                            <td>{{ $ip->label }}</td>
                            <td>{{ $ip->comment }}</td>
                            <td>
                                <a href="/ipaddress/show/{{ $ip->id }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="/ipaddress/delete/{{ $ip->id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layout>
