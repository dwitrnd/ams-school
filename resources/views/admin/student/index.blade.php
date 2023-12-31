<x-main-layout>
    @section('title','Student List')
    <h1 class="heading"> Student List</h1>
    <div class="underline mx-auto hr_line"></div>

    <div class="button_container container ">
        <a href="{{ route('student.create') }}" class="btn add_button">Add</a>
        <a href="{{ route('student.getBulkUpload') }}" class="btn add_button">Bulk Upload</a>
    </div>
    <div class="table_container mt-3">
        <table class="_table mx-auto amsTable" id="amsTable">
            <thead>
                <tr class="table_title">
                    <th>S.N</th>
                    <th>Student's Name</th>
                    <th>Roll Number</th>
                    <th>Email Address</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->section->grade->name }}-{{ $student->section->name }}</td>
                        <td>{{ $student->status }}</td>
                        <td class="">
                            <a href="{{ route('student.edit', ['id' => $student->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('student.delete', ['id' => $student->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" align="center">No Students Available</td>
                        {{-- Colspan doesn't work with DataTables.
                        The following trick is used to suppress column count error.
                        --}}
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main-layout>
