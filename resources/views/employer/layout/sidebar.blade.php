<div class="tree_widget-sec">
    <ul>
    <li class="inner-child {{ ($left_active == 'profile')? 'active':'' }}">
            <a href="#" title="" class="main-a"><i class="la la-file-text"></i>My Profile</a>
            <ul>
                <li><a href="{{ route('employer.profile') }}" title="">View Profile</a></li>
                <li><a href="{{ route('employer.profile.edit') }}" title="">Edit Profile</a></li>
            </ul>
        </li>
        <li class="inner-child {{ ($left_active == 'company')? 'active':'' }}">
            <a href="#" title="" class="main-a"><i class="la la-file-text"></i>Company Details</a>
            <ul>
                <li><a href="{{ route('employer.company.profile') }}" title="">View Details</a></li>
                <li><a href="{{ route('employer.company.profile.edit') }}" title="">Edit Details</a></li>
            </ul>
        </li>
        <li class="inner-child {{ ($left_active == 'job')? 'active':'' }}">
            <a href="#" title="" class="main-a"><i class="la la-file-text"></i>Post a Job</a>
            <ul>
                <li><a href="{{ route('employer.new.job') }}" title="">New Job</a></li>
                <li><a href="{{ route('employer.drafted.job') }}" title="">Drafted Job</a></li>
            </ul>
        </li>
        <li class="inner-child {{ ($left_active == 'manage_job')? 'active':'' }}">
            <a href="{{ route('employer.manage.job') }}" title="" class=""><i class="la la-briefcase"></i>Manage Jobs</a>
        </li>
        <li class="inner-child {{ ($left_active == 'shortlisted')? 'active':'' }}">
            <a href="{{ route('employer.shortlisted.candidate')}}" title="" class=""><i class="la la-bookmark"></i>Shorlisted</a>
        </li>
        <li class="inner-child {{ ($left_active == 'browse_resume')? 'active':'' }}">
            <a href="{{ route('employer.browse.candidate.resume') }}" title="" class=""><i class="la la-binoculars"></i>Browse Resume</a>
        </li>
        <li class="inner-child"> 
            <a href="#" title="" class=""><i class="la la-lock"></i>Change Password</a>
        </li>
        <li><a href="{{ route('employer.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" title="" class=""><i class="la la-unlink"></i>Logout</a></li>
    </ul>
</div>