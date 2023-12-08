<x-main-layout>
    <form action="{{ route('user.update', ['id' => $users->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name"> User name</label>
            <input type="text" name="name" value="{{ $users->name }}">
        </div>
        <div>
            <label> Email</label>
            <input type="email" name="email" value="{{ $users->email }}">
        </div>
        <div class="col-md-8 mt-5">
            <div class="row align-items-center">
                <label for="role" class=" col-md-3 form-label">Role</label>
                <div class="col-md-2 form-check form-check-inline">
                    <input class="form-check-input" id="admin" type="checkbox" name="role[]" value="1"
                        {{ in_array(1, old('roles', $users->role->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="admin">
                        Admin
                    </label>
                </div>
                <div class="col-md-3 form-check form-check-inline ms-1">
                    <input class="form-check-input" id="teacher" type="checkbox" name="role[]" value="2"
                        {{ in_array(2, old('roles', $users->role->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="teacher">
                        Teacher
                    </label>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>

    </form>
</x-main-layout>
