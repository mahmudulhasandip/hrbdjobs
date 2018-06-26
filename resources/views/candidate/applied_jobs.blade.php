@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Applied Jobs</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                 <div class="row no-gape">
                    <aside class="col-lg-3 column border-right">
                        <div class="widget" id="sidebar">
                            @include('candidate.layout.sidebar')
                        </div>
                        
                    </aside>
                    <div id="wall" class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <h3>Manage Applied Jobs</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Applied Job</td>
                                            <td>Position</td>
                                            <td>Date</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-list-title">
                                                    <i>Massimo Artemisis</i><br />
                                                    <span><i class="la la-map-marker"></i>Sacramento, California</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-list-title">
                                                    <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span>October 27, 2017</span><br />
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li><span>Withdraw</span><a href="#" title=""><i class="la la-close"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-list-title">
                                                    <i>StarHealth</i><br />
                                                    <span><i class="la la-map-marker"></i>Rennes, France</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-list-title">
                                                    <h3><a href="#" title="">Regional Sales Manager South east Asia</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span>October 27, 2017</span><br />
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li><span>Withdraw</span><a href="#" title=""><i class="la la-close"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-list-title">
                                                    <i>Altes Bank</i><br />
                                                    <span><i class="la la-map-marker"></i>Istanbul, Turkey</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-list-title">
                                                    <h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span>October 27, 2017</span><br />
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li><span>Withdraw</span><a href="#" title=""><i class="la la-close"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-list-title">
                                                    <i>MediaLab</i><br />
                                                    <span><i class="la la-map-marker"></i>Ajax, Ontario</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-list-title">
                                                    <h3><a href="#" title="">Marketing Director</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span>October 27, 2017</span><br />
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li><span>Withdraw</span><a href="#" title=""><i class="la la-close"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection

