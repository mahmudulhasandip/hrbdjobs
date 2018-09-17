@foreach($applied_jobs as $job)

<div class="emply-resume-list">
    <div class="emply-resume-thumb">
        <img src="{{ asset('storage/uploads/'. (($job->candidate->dp) ? $job->candidate->dp : 'default_user.png')) }}" alt="Photo" />
    </div>

    <div class="emply-resume-info">
        <h3>
            <a href="{{ route('employer.public.candidate.resume', ['job_id' => $job->id, 'id' => $job->candidate->id ]) }}" target="_blank" title="">{{ $job->candidate->fname }} {{ $job->candidate->lname }} <span class="text-blue">(Age: {{ date_diff(date_create(date('Y-m-d', strtotime($job->candidate->date_of_birth))), date_create(date('Y-m-d')))->format("%y years") }})</span></a>
        </h3>
        <span>
            {{-- <i>{{ sizeof($job->candidate->candidateEducation) ? $job->candidate->candidateEducation->first()->institution_name : '-' }}</i> --}}
            <i>{{ sizeof($job->candidate->candidateEducation) ?  $job->candidate->candidateEducation->first()->candidateInstitute->name: '' }}</i>
        </span>
        <p>
            <i class="la la-phone"></i>{{ $job->candidate->phone }}
        </p>
        <p>
            <i class="la la-briefcase"></i>{{ $job->candidate->candidateSkill->first()['experience'] }} Year{{($job->candidate->candidateSkill->first()['experience'] > 1) ? 's' : '' }}
        </p>
    </div>
    <div class="action-resume">
        <div class="action-center">
            <span>Action
                <i class="la la-angle-down"></i>
            </span>
            <ul>
                <li>
                    <a href="{{ route('employer.public.candidate.resume', ['job_id' => $job->id, 'id' => $job->candidate->id ]) }}" target="_blank" title="">View CV</a>
                </li>
                <li>
                    <a href="{{ route('public.candidate.profile', $job->candidate->id) }}" target="_blank" title="">View Profile</a>
                </li>
                <li>
                @if($job->is_short_listed)
                <a href="javascript: void(0);" class="shortListCandidate shortlisted" data-jobId="{{ $job->job_id }}" data-candidateId="{{ $job->candidate_id }}" title="">Remove from Shortlist</a>
                @else
                <a href="javascript: void(0);" class="shortListCandidate unshortlisted" data-jobId="{{ $job->job_id }}" data-candidateId="{{ $job->candidate_id }}" title="">Add To Shortlist</a>
                @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="del-resume">
        <a href="javascript;" class="reject_candidate" data-jobId="{{ $job->job_id }}" data-candidateId="{{ $job->candidate_id }}" title="Reject Candidate">
            <i class="la la-times text-red"></i>
        </a>
    </div>
</div>
<!-- Emply List -->
@endforeach

<div class="pagination-laravel">
    {{ $applied_jobs->appends($_GET)->links() }}
</div>