<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Resume of {{ $candidate_resume->candidate->fname.' '. $candidate_resume->candidate->lname}}</title>
	<link rel="stylesheet" href="">
</head>
<body style="margin:0px;padding:0px;overflow:hidden">
	<iframe src ="{{ asset('storage/uploads/resumes/'.$candidate_resume->resume) }}" frameborder="0" style="overflow:hidden;height:100vh;width:100%" height="100vh" width="100%" allowfullscreen webkitallowfullscreen ></iframe>
</body>
</html>