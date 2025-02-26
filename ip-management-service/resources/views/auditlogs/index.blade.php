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
            <h2 class="text-center">Audit Logs</h2>
            <table class="table table-hover" id="auditLogsTable">
                <thead class="thead-dark">
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Details</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#auditLogsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('audit-logs.index') }}",
                "columns": [{
                        "data": "user",
                        "name": "user.name"
                    },
                    {
                        "data": "action",
                        "name": "action"
                    },
                    {
                        "data": "details",
                        "name": "details"
                    },
                    {
                        "data": "created_at",
                        "name": "created_at"
                    }
                ],
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
</x-layout>
