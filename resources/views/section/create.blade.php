<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create </title>
</head>

<body>
    @if ($errors->all())
        @foreach ($errors->all() as $error)
            <div class="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{route('section.store')}}" method="post">
        @csrf
        <div>
            <label for="name"> Section Name</label>
            <input type="text" name="name" placeholder="Enter Section Name" required>
        </div>
        <div>
            <div class="form-group">
                <label for="Choose Section Type">Choose Section Type</label>
                <select name="type" class="form-control">
                    <option value="optional">Optional</option>
                    <option value="compulsory">Compulsory</option>
                </select>
            </div>
        </div>
        <label for="">Grade</label>
        <select name="grade_id">
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
            @endforeach
        </select>
        <label for="">Teacher</label>
        <select name="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>

</body>
<script>
    setTimeout(() => {
        document.querySelector('.alert').style.display = 'none';
    }, 2000);
</script>

</html>
