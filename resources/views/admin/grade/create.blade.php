<x-create-layout>
    @section('title', 'Add Grade')
    <h1 class="heading"> Add New Grade</h1>
    <div class="underline mx-auto hr_line"></div>
    <div class="anchor_tag">
        <a href="{{route("grade.index")}}">
            <h5 class="go_back">←</h5>
        </a>
    </div>
    <div class="form_container">
        <form action="{{ route('grade.store') }}" method="post">
            @csrf
            <div>
                <label for="name"> Grade Name<span class="star">*</span></label>
                <div class="input_container">
                    <input type="number" name="name" placeholder="Enter Grade Name" required>
                </div>
            </div>
            <div>
                <label> Start Date<span class="star">*</span></label>
                <div class="input_container">
                    <input type="date" name="start_date" placeholder="Start Date" required>
                </div>
            </div>
            <div>
                <label>End Date<span class="star">*</span></label>
                <div class="input_container">
                    <input type="date" name="end_date" placeholder="End Date" required>
                </div>
            </div>
            <button class="btn btn-success submit_button" type="submit">Add</button>
        </form>
    </div>
</x-create-layout>
