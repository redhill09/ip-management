<x-layout>
    <div class="row">
        <div class="col align-self-center">
            <form action="/ipaddress/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="ip-address">Ip Address</label>
                    <input type="text" class="form-control" name="ip" id="ip_address" placeholder="Ip Address">
                </div>
                <div class="form-group">
                    <label for="ip-label">Label</label>
                    <input type="text" class="form-control" name="label" id="ip_label" placeholder="ex: John Doe">
                </div>
                <div class="form-group">
                    <label for="ip-comment">Comment</label>
                    <textarea class="form-control" name="comment" id="ip_comment"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
