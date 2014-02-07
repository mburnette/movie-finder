<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>MOVIE LOOKUP</title>

<link rel="stylesheet" type="text/css" href="movie-finder.css">
<link href='http://fonts.googleapis.com/css?family=Artifika' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

</head>

<body>
    
    <div class="lookupForm">
        <form id="movieLookup">
            <i class="fa fa-play-circle-o"></i> <input class="movieEntry gfont" type="text" name="movie" id="movie" placeholder="Type a movie name." />
            <input class="movieSubmit gfont" type="submit" value="Search" />
        </from>
    </div>

    <p class="loader"><img src="ajax-loader.gif" /></p>

    <div class="movieRating">
    </div>

    <div class="movieYear">
    </div>

    <p class="noresult gfont">Unfortunately, your search returned no results. Please try again.</p>

<script src="movie-finder.js"></script>

</body>
</html>