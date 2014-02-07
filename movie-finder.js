$(window).on('load', function(){
    $('input.movieEntry').focus();
});


$('#movieLookup').submit(function(e){

    $('.loader').show();
    $('.noresult').hide();

    var movie = $('#movie').val(), movieID;
    $('.movieYear').empty();

    // Send Request Search
    $.get("http://www.omdbapi.com/?s="+movie, function( searchData ) {
        var searchJSON = eval("(" + searchData + ")");

        console.table(searchJSON);

        var d = $.map(searchJSON, function(value, index) {
            return [value];
        });

        var movCt = 0;

        for(var i=0; i < d[0].length; i++){
            var movieTitle = d[0][i]['Title'];
            movieID = d[0][i]['imdbID'];
            
            if(movieTitle.toLowerCase().indexOf(movie.toLowerCase()) != '-1'){

                // Send Request ID
                $.get("http://www.omdbapi.com/?i="+movieID, function( movieData ) {
                    var movieJSON = eval("(" + movieData + ")");

                    $('.movieYear').append('<p class="movieRow"><a href="http://www.imdb.com/title/' + movieJSON.imdbID + '" target="_blank" title="See '+ movieJSON.Title +' on IMDB.com">' + movieJSON.Title + ' <i class="fa fa-external-link"></i></a> <strong>(' + movieJSON.Rated + ')</strong> <em>' + movieJSON.Year + '</em></p>');

                });

            }
        }

        $('.loader').hide();

    });

    e.preventDefault();
});