<x-layout>
    {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}

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
                                <a href="/ipaddress/edit/{{ $ip->id }}" class="btn btn-success btn-sm">View</a>
                                @if (Auth::user()->role == 'super-admin')
                                    <a href="/ipaddress/delete/{{ $ip->id }}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layout>
