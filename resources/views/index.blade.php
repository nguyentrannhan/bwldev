<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BWL Channel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <style>
        .btn-reaction {
            text-align: center;
            cursor: pointer;
            outline: none;
            background-color: #ffffff;
            border: 2px solid rgba(0, 0, 0, .1);
            width: 60px;
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
            border: none
        }

        .ellipsis {
            color: #a09c9c
        }

        hr {
            color: #a09c9c;
            margin-top: 4px;
            margin-bottom: 8px
        }

        .ellipsis i {
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
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-8" style="background-color:lavender;">
            <div class="card">
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
</div>
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
</script>
</body>
</html>
