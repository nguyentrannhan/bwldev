<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BWL Channel</title>
    <base href="{{ asset('') }}">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
    <style>
        .button {
            text-align: center;
            cursor: pointer;
            outline: none;
            background-color: #ffffff;
            border: 2px solid rgba(0, 0, 0, .1);
        }

        .button:hover {
            background-color: #cecece
        }

        .button:active {
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

        .btn-reaction {
            width: 60px;
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
    </style>
</head>
<body>
<div class="mt-4">
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8" style="background-color:lavender;">
                <div class="card">
                    @foreach($images as $key=>$image)
                        {{--header--}}
                        <div id="header" class="d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center">
                                <img src="https://i.imgur.com/UXdKE3o.jpg" width="50" class="rounded-circle" alt="avatar">
                                <div class="d-flex flex-column ml-2"><span class="font-weight-bold">User Name</span>
                                </div>
                                <div class="d-flex flex-row align-items-center ellipsis ml-3">
                                <small class="mr-2">
                                    {{gmdate('d/m/Y', $image->createdTimestamp->__toString() / 1000)}}
                                </small>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center ellipsis">
                                <i class="fa fa-ellipsis-h"></i>
                            </div>
                        </div>
                        {{--content--}}
                        <div id="image">
                            <img src="@if(isset($image->links[0])) {{$image->links[0]}} @else  @endif"
                                class="img-fluid" alt="image">
                        </div>
                        {{--reaction--}}
                        <div id="reaction" class="p-2">
                            <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-3 pb-1">
                                <ul class="list-inline d-flex flex-row align-items-center m-0">
                                    @foreach($image->reactions as $reaction)
                                        <li class="list-inline-item">
                                            <button class="btn button btn-reaction">
                                                {{$reaction->emoji}}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    {{--end--}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</body>
</html>
