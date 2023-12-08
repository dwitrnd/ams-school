<x-edit-layout>

    <form action="{{ route('student.update', ['id' => $students->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name"> Student Name<span class="star">*</span></label>
        <div class="input_container">
            <input type="text" name="name" value="{{ $students->name }}">
        </div>
        <label>Roll Number<span class="star">*</span></label>
        <div class="input_container">
            <input type="number" name="roll_no" value="{{ $students->roll_no }}">
        </div>
        <label>Email<span class="star">*</span></label>
        <div class="input_container">
            <input type="email" name="email" value="{{ $students->email }}">
        </div>
        <label>section<span class="star">*</span></label>
        <div class="input_container">
            <select name="section_id">
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Update</button>

    </form>
</x-edit-layout>
