<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Admin Dashboard</li>
            <li class="mega-menu mega-menu-lg">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Lacturer</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('teacher.index') }}">Lacturer</a></li>
                    <li><a href="{{ route('designation.index') }}">Designation</a></li>
                </ul>
            </li>

            <li><a href="{{ route('department.index') }}">Department</a></li>
            <li><a href="{{ route('classroom.index') }}">Classroom</a></li>
            <li><a href="{{ route('student.index') }}">Students</a></li>
            <li><a href="{{ route('subject.index') }}">Subject</a></li>
            <li><a href="{{ route('timetable.index') }}">Timetable</a></li>
        </ul>


    </div>
</div>
