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
            <h2 class="text-center">IP Addresses</h2>
            <table class="table table-hover" id="ipTable">
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
                {{-- <tbody>
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
                </tbody> --}}
            </table>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#ipTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/ipaddress') }}",
                "columns": [{
                        "data": "ip"
                    },
                    {
                        "data": "label"
                    },
                    {
                        "data": "comment"
                    },
                    {
                        "data": "actions",
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });
        });
    </script>
</x-layout>
