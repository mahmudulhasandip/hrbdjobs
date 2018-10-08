<div class="tree_widget-sec widget border">

    <ul>
        <li class="inner-child  {{ ($left_active == 'dashboard')? 'active':'' }}">
            <a href="{{ route('candidate.main') }}" title="" class=""><i class="la la-home"></i>Dashboard</a>
        </li>
        <li class="inner-child {{ ($left_active == 'profile')? 'active':'' }}">
            <a href="#" title="" class="main-a"><i class="la la-file-text"></i>My Profile</a>
            <ul>
                <li><a href="{{ route('candidate.profile') }}" title="" target="_blank">View Profile</a></li>
                <li><a href="{{ route('candidate.profile.edit') }}" title="">Edit Profile</a></li>
                <li><a href="{{ route('candidate.change.password') }}" title="">Change Password</a></li>
            </ul>
        </li>
        <li class="inner-child  {{ ($left_active == 'applied_jobs')? 'active':'' }}">
            <a href="{{ route('candidate.applied.jobs') }}" title="" class=""><i class="la la-briefcase"></i>Applied Job</a>
        </li>
        <li class="inner-child {{ ($left_active == 'resume')? 'active':'' }}">
            <a href="#" title="" class="main-a"><i class="la la-file-pdf-o"></i></i>My Resume</a>
            <ul>
                <li><a href="{{ route('candidate.resume.view') }}">View Resume</a></li>
                <li><a href="{{ route('candidate.resume.upload') }}" title="">Upload Resume</a></li>
            </ul>
        </li>
        <li class="inner-child {{ ($left_active == 'appropriate_job')? 'active':'' }}">
            <a href="{{ route('candidate.appropriate.job') }}" title="" class=""><i class="la la-check-circle"></i>Appropriate For Me</a>
        </li>
        <li class="inner-child {{ ($left_active == 'follow_companies')? 'active':'' }}">
            <a href="{{ route('candidate.follow.companies') }}" title="" class=""><i class="la la-binoculars"></i>Follow Companies</a>
        </li>
        <li class="inner-child {{ ($left_active == 'shortlisted')? 'active':'' }}">
            <a href="{{ route('candidate.shortlisted.job') }}" title="" class=""><i class="la la-bookmark"></i>Shorlisted</a>
        </li>
        <li><a href="{{ route('candidate.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" title="" class=""><i class="la la-unlink"></i>Logout</a>
        </li>
    </ul>
</div>

<div class="widget">
    <div class="skill-perc">
        <h3>Profile Completed</h3>
        <p></p>
        <div class="skills-bar">
            <span>85%</span>
            <div
                class="second circle"
                data-size="155"
                data-thickness="60">
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('/js/circle-progress.min.js') }}"></script>
<script>
(function($) {

  /*
   * Example 2:
   *
   * - default gradient
   * - listening to `circle-animation-progress` event and display the animation progress: from 0 to 100%
   */
  $('.second.circle').circleProgress({
  	startAngle: -Math.PI / 8 * 0,
    value: 0.85,
    emptyFill: 'rgba(0, 0, 0, 0)',
    fill: {gradient: ['#fa3979', '#e22d68']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });

})(jQuery);
</script>
@endpush