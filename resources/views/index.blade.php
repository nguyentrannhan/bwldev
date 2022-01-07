<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BWL Channel</title>
    <link href="{{'assets/css/bootstrap.min.css'}}" rel="stylesheet">
    <link href="{{'assets/css/font-awesome.min.css'}}" rel="stylesheet">
    <link href="{{'assets/css/style.css'}}" rel="stylesheet">
</head>
<body>
{{--header--}}
<nav class="navbar navbar-expand-md navbar-light bg-light navbar-header nav-fixed-top">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item ml-auto">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>
{{--end header--}}
<div class="container main-content">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-8 col-md-12 col-sm-12">
                <div id="infinite-scroll">
                    @include('data')
                </div>
                <div class="ajax-load text-center" style="display:none">
                    <p>
                    <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Loading...
                </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
<script>
    var page = 1;
    $(window).scroll(function () {
        var scrollHeight = $(document).height() - 0.55;
        var scrollPosition = $(window).scrollTop() + $(window).height();
        if (scrollPosition > scrollHeight) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function () {
                    $('.ajax-load').show();
                }
            })
            .done(function (data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#infinite-scroll").append(data.html);
            })
            .fail(function () {
                alert('Server not responding!');
            });
    }

    $(document).ready(function() {
        $('.show-comments').click(function() {
            var $toggle = $(this);
            var id = "#comments-" + $toggle.data('id');
            $( id ).toggle();
        });
    });
</script>
</body>
</html>
