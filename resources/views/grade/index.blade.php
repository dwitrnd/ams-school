<x-main-layout>
    <h1 class="heading"> {{ $pageTitle }}</h1>
    <div class="underline mx-auto hr_line"></div>
    <div class="button_container container ">
        <a href="{{ route('grade.create') }}" class="btn btn-primary add_button">Add</a>
    </div>    <div class="table_container mt-3">
        <table class="_table mx-auto amsTable" id="amsTable">
            <thead>
                <tr class="table_title">
                    <th>S.N</th>
                    <th>Grade</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grades as $grade)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->start_date }}</td>
                        <td>{{ $grade->end_date }}</td>
                        <td class="">
                            <a href="{{ route('grade.edit', ['id' => $grade->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('grade.delete', ['id' => $grade->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan='5'>No Grades Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main-layout>
