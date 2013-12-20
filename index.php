<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>MOVIE LOOKUP</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<style>
body {
  background: green;
  padding: 0;
  margin: 0;
  text-align: center;
    font-family: sans-serif;
}

.lookupForm {
    text-align: center;
    padding: 1em;
    background: #eee;
}

input {
    padding: 1em;
}

.movieRating {
    font-family: serif;
  margin-top: 0.5em;
    font-size: 10em;
  color: #fff;
}

.movieYear {
  margin-top: 0.5em;
  font-size: 2em;
  color: yellow;
}
</style>

</head>

<body>
    
    <div class="lookupForm">
        <form id="movieLookup">
            <input type="text" name="movie" id="movie" placeholder="Type a movie name." />
            <input type="submit" value="Search" />
        </from>
    </div>

    <div class="movieRating">
    </div>

    <div class="movieYear">
    </div>


<script>
jQuery(function($) {
// ---------------------------------------------------------------------------------------------

/*
$('#movieLookup').submit(function(e){
    var movie = $('#movie').val(), movieID;

    // Send Request Search
    $.get("http://www.omdbapi.com/?s="+movie, function( data ) {
        var searchJSON = eval("(" + data + ")");

        console.table(searchJSON);

        var d = $.map(searchJSON, function(value, index) {
            return [value];
        });

        movieID = d[0][0]['imdbID'];
//        console.log(movieID);

        // Send Request ID
        $.get("http://www.omdbapi.com/?i="+movieID, function( data ) {
            var movieJSON = eval("(" + data + ")");

            console.log(movieJSON.Rated);

            $('.movieRating').html(movieJSON.Rated);
            $('.movieYear').html(movieJSON.Year + ' <br/><small>(' + movieJSON.Title + ')</small>');
        });

    });

    e.preventDefault();
});
*/

$('#movieLookup').submit(function(e){
    var movie = $('#movie').val(), movieID;
    $('.movieYear').empty();

    // Send Request Search
    $.get("http://www.omdbapi.com/?s="+movie, function( searchData ) {
        var searchJSON = eval("(" + searchData + ")");

        console.table(searchJSON);

        var d = $.map(searchJSON, function(value, index) {
            return [value];
        });

        for(var i=0; i < d[0].length; i++){
            var movieTitle = d[0][i]['Title'];
            movieID = d[0][i]['imdbID'];
            
            if(movieTitle.toLowerCase().indexOf(movie.toLowerCase()) != '-1'){

                // Send Request ID
                $.get("http://www.omdbapi.com/?i="+movieID, function( movieData ) {
                    var movieJSON = eval("(" + movieData + ")");

//                    $('.movieRating').html(movieJSON.Rated);
                    $('.movieYear').append('<a href="http://www.imdb.com/title/' + movieJSON.imdbID + '" target="_blank">' + movieJSON.Title + '</a> <strong>(Rated ' + movieJSON.Rated + ')</strong> <em>' + movieJSON.Year + '</em><br/>');

                    console.log(movieJSON.Title + ' / Rating: ' + movieJSON.Rated);

                });

            }
        }

    });

    e.preventDefault();
});







// ---------------------------------------------------------------------------------------------
});
</script>
</body>
</html>