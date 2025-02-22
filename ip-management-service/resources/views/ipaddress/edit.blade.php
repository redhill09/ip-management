<x-layout>
    {{-- @if (session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif --}}

    <div class="row">
        <div class="col align-self-center">
            <form action="/ipaddress/update/{{ $ip->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="ip-address">Ip Address</label>
                    <input type="text" class="form-control" name="ip" id="ip_address" placeholder="Ip Address" value="{{ $ip->ip }}">
                </div>
                @error('ip')
                    <p class="bg-danger text-white">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="ip-label">Label</label>
                    <input type="text" class="form-control" name="label" id="ip_label" placeholder="ex: John Doe" value="{{ $ip->label }}">
                </div>
                @error('label')
                    <p class="bg-danger text-white">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="ip-comment">Comment</label>
                    <textarea class="form-control" name="comment" id="ip_comment">{{ $ip->comment }}</textarea>
                </div>
                @if ($ip->user_id == Session::get('id') || Auth::user()->role == 'super-admin')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-layout>
