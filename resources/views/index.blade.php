<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BWL Channel</title>
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <style>
        .btn-reaction {
            text-align: center;
            cursor: pointer;
            outline: none;
            background-color: #ffffff;
            border: 2px solid rgba(0, 0, 0, .1);
            width: 60px;
            margin-bottom: 5px;
        }

        .btn-reaction:hover {
            background-color: #cecece
        }

        .btn-reaction:active {
            background-color: #cecece;
            transform: translateY(4px);
        }

        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .card {
            margin-bottom: 30px;
        }

        .ellipsis {
            color: #a09c9c
        }

        hr {
            color: #a09c9c;
            margin-top: 4px;
            margin-bottom: 8px
        }

        .three-dots {
            margin-top: 3px;
            cursor: pointer
        }

        .icons i {
            font-size: 25px
        }

        .status small {
            margin-right: 10px;
            color: blue
        }

        #image {
            background-color: #cecece;
        }

        #image img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            min-width: 50%;
        }

        .ajax-load {
            padding: 10px 0px;
            width: 100%;
        }

        .list-reaction {
            float: left;
            margin-right: 5px;
        }

        .muted-color {
            color: #a09c9c;
            font-size: 13px
        }

        .rounded-image {
            border-radius: 50% !important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 50px
        }

        .name {
            font-weight: 600
        }

        .comment-text {
            word-break: break-word;
        }

        .comments {
            display: none;
        }

        .dropdown-toggle::before {
            display: none !important;
        }
        .dropdown-toggle::after {
            display: none !important;
        }

        .btn-dropdown {
            text-align: center;
            cursor: pointer;
            outline: none;
            background-color: #ffffff;
            border: none;
            /*wid/th: 60px;*/
            margin-bottom: 5px;
        }

        .btn-dropdown:hover {
            background-color: #cecece
        }

        .btn-dropdown:active {
            background-color: #cecece;
            transform: translateY(4px);
        }
    </style>
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-8">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--ajax loading is disable when importing jquery--}}
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    var page = 1;
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
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
